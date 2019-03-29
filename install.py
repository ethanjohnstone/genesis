#!/usr/bin/env python3

import fileinput
import os
import glob
import sys
import subprocess
import json
from shutil import copyfile

# Parse arguments
def query_user_data (data = {}):
    cyanColor = "\033[36m"
    resetColor = "\033[39m"

    for key, value in data.items ():
        print ("> {}{}:{}".format (cyanColor, value, resetColor), end=" ")
        user_input = input ()
        data [key] = user_input

    return data

# Ask questions
def question_user (data = {}):
    cyanColor = "\033[36m"
    grayColor = "\033[90m"
    resetColor = "\033[39m"

    for key, value in data.items ():
        print ("> {}{}: {}(Y/n){}".format (cyanColor, value, grayColor, resetColor), end=" ")
        user_input = input ()
        data [key] = user_input.lower () != "n"

    return data

# Grab all files
def get_files (exclude = []):
    current_path = os.path.dirname(os.path.abspath(__file__))
    files_found = []

    for (parent, subdirs, files) in os.walk(current_path, topdown=True):
        subdirs[:] = [d for d in subdirs if d not in exclude]
        files[:] = [f for f in files if f not in exclude]
        files_found.extend (map (lambda x: os.path.join (parent, x), files))

    return files_found

# Replace file contents
def replace_in_file (filename, text, replacement_text):
    with fileinput.FileInput(filename, inplace=True) as lines:
        for line in lines:
            print(line.replace(text, replacement_text), end='')

# Print steps
stepNumber = 1
def step (text, end="..."):
    global stepNumber
    grayColor = "\033[90m"
    resetColor = "\033[39m"
    startText = ("\n" if stepNumber>1 else "")
    print ("{}{}{}. {}{}{}".format (startText, grayColor, stepNumber, text, end, resetColor))
    stepNumber += 1

# Copy env file
step("Creating .env file")
current_path = os.path.dirname(os.path.abspath(__file__))
copyfile(os.path.join (current_path, ".env.example"), os.path.join (current_path, ".env"))

# Insert template data
step ("Filling template data")

# Grab all files
files = get_files (exclude=[
    ".git",
    "install.py",
    "README.md",
    ".env.example"
])

# Grab all necessary data
params = query_user_data(data={
    "name": "Name of this project (lowercase & dashed)",
    "namespace": "PHP project namespace",
    "author_name": "Name of the author",
    "author_email": "EMail address of the author",
    "db_host": "Database host",
    "db_user": "Database user",
    "db_pass": "Database password",
    "db_name": "Database name"
})

# Replace variables
for param, value in params.items():
    text = ("{{" + param + "}}")
    for file in files:
        replace_in_file (filename=file, text=text, replacement_text=value)

# Query dependencies
step ("Collecting dependency requirements")

dependency_results = question_user(data={
    "symbiote/silverstripe-gridfieldextensions#^3.2": "GridField Extensions",
    "bummzack/sortablefile#^2.1": "Sortable Files",
    "undefinedoffset/sortablegridfield#^2.0": "Sortable GridFields",
    "jonom/focuspoint#^3.0": "FocusPoint",
    "wilr/silverstripe-googlesitemaps#^2.1": "Google Sitemaps"
})

composer_file = os.path.join (current_path, "composer.json")
open(composer_file, "rw") as file_handle:  
    package_json = json.loads (file_handle.read())
    for package, value in dependency_results.items ():
        if value:
            package_data = package.split("#")
            package_name, package_version = package_data[0], package_data[1]
            package_json ["require"][package_name] = package_version

    file_handle.seek (0)
    file_handle.write (json.dumps (package_json, sort_keys=True, indent=4, separators=(',', ': ')))
    file_handle.close ()

# Install composer dependencies
step ("Installing composer dependencies")
subprocess.check_output(["rm",  "-rf", "./vendor/"])
subprocess.check_output(["composer", "install"])

# Install NPM dependencies
step ("Installing NPM dependencies")
subprocess.check_output(["rm",  "-rf", "./app/node_modules/"])
subprocess.check_output(["npm", "install"])
subprocess.check_output(["npm", "run", "dev"])

# Done
step ("You're all set!\nPlease verify the integrity of the created system before proceeding.\nRun 'npm run watch' from here.", end="")

# Self-destruct
os.remove (sys.argv [0])