import fileinput
import os
import glob

# Parse arguments
def query_user_data (data = {}):
    cyanColor = "\033[36m"
    resetColor = "\033[39m"

    for key, value in data.items ():
        print ("> {}{}:{}".format (cyanColor, value, resetColor), end=" ")
        user_input = input ()
        data [key] = user_input

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
            print(line.replace("{{" + text + "}}", replacement_text), end='')

# Print intro
print ("Installing SilverStripe...\n")

# Grab all files
files = get_files (exclude=[
    ".git",
    "install.py",
    "README.md"
])

# Grab all necessary data
params = query_user_data(data={
    "name": "Name of this project",
    "title": "HTML default title of this project"
})

# Replace variables
for param, value in params.items():
    print ("Replacing param '{}'...".format (param))
    for file in files:
        replace_in_file (filename=file, text=("{{" + param + "}}"), replacement_text=value)

# Done
print ("Done")