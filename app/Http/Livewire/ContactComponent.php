<?php

namespace App\Http\Livewire;
use App\Models\Contact;

use Livewire\Component;

class ContactComponent extends Component
{
  public $name;
  public $email;
  public $phone;
  public $comment;
 public function updated($fields)
 {
    $this->validateOnly($fields,[
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'comment' => 'required',
      ]);
 }

  public function sendMessage()
  {
    $this->validate([
        'name' => 'required',
        'email' => 'required',
        'phone' => 'required',
        'comment' => 'required',
      ]);
      $contact = new Contact();
      $contact->name = $this->name;
      $contact->email= $this->email;
      $contact->phone = $this->phone;
      $contact->comment = $this->comment;
      $contact->save();
      session()->flash('message','thanks,Your message has been sent successfully');
      
  }
    public function render()
    {
        return view('livewire.contact-component')->layout('layouts.base');
    }
}
