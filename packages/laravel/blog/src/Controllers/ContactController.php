<?php

namespace Laravel\Blog\Controllers;

use Laravel\Blog\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view('blog::admin.contact.index', compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;

        $contact->save();

        return redirect()->back()->with('success', 'We will contact with you as soon as possible');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $contact = Contact::where('id', $id)->first();
        $html = '

        <div class="modal-header">
          <h4 class="modal-title">Contact Us</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>


        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputName1">Name</label>
                    <input readonly type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="'.$contact->name.'">
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputName1">Email</label>
                    <input readonly type="text" name="name" class="form-control" id="exampleInputName1" placeholder="Name" value="'.$contact->email.'">
                </div>
            </div>

            <div class="col-md-12">
                <div class="form-group">
                    <label for="exampleInputName1">Message</label>
                    <textarea readonly id="text" class="form-control   area" name="message" rows="5" cols="100" >'.$contact->message.'</textarea>
                </div>
            </div>

          </div>
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        ';

        return $html;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact = Contact::where('id', $id)->delete();
        return true;
    }
}
