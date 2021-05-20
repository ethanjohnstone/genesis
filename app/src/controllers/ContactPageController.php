<?php

namespace App\Controllers;

use PageController;
use SilverStripe\Forms\Form;
use App\Models\ContactSubmission;
use SilverStripe\Forms\FieldList;
use SilverStripe\Forms\TextField;
use SilverStripe\Forms\EmailField;
use SilverStripe\Forms\FormAction;
use SilverStripe\Forms\TextareaField;
use SilverStripe\Forms\RequiredFields;

class ContactPageController extends PageController
{
    private static $allowed_actions = [
        "ContactForm"
    ];

    public function ContactForm()
    {
        $form = new Form(
            $this,
            __FUNCTION__,
            FieldList::create(
                TextField::create("Name"),
                EmailField::create("Email", "Email Address"),
                TextField::create("Phone"),
                TextareaField::create('Message')
            ),
            FieldList::create(
                FormAction::create("submitContact", "Submit")
            ),
            RequiredFields::create([
                "Name", "Email", "Message"
            ])
        
        );

        // $form->enableSpamProtection();

        return $form;
    }

    public function submitContact($data, Form $form)
    {
        $submission = new ContactSubmission();
        $form->saveInto($submission);
        $submission->write();

        //TODO: Insert Email code here
        
        return $this->redirect($this->Link() . "?success=1");
    }
}