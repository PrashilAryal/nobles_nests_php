@extends('adminpanel')

@section('adminContent')

<div class="recentorders">
    <div class="cardHeader">
        <h2>Setting</h2>
    </div>
    <div>
        <!-- <section class="editRecipeSection"> -->
        <div class="editRecipeContainer">
            <form action="{{route('edit_admin')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="editRecipeForm" id="editRecipeForm">
                    <!-- <h2>Edit Recipe</h2> -->
                    <div class="editRecipeFormBox">
                        <div class="editRecipeInputBox w50">
                            <input type="hidden" name="id" id="admin_id" value="{{$data->id}}" autocomplete="off"
                                required>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <input type="text" name="chef_name" id="chef_name" value="{{$data->chef_name}}"
                                autocomplete="off" required>
                            <span>Name</span>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <input type="email" name="chef_email" id="chef_email" value="{{$data->chef_email}}"
                                autocomplete="off" required>
                            <span>Email</span>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <input type="password" name="chef_password" id="chef_password"
                                placeholder="New Password(leave it if you don't want to change)" autocomplete="off">
                            <span>Password</span>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <input type="text" name="chef_phone_num" id="chef_phone_num"
                                value="{{$data->chef_phone_num}}" autocomplete="off" required>
                            <span>Phone Number</span>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <input type="text" name="chef_address" id="chef_address" value="{{$data->chef_address}}"
                                autocomplete="off" required>
                            <span>Address</span>
                        </div>
                        <div class="editRecipeInputBox w50">
                            <div class="editRecipeButton">
                                <input type="submit" id="editRecipe_btn" value="Update">
                            </div>
                        </div>
                    </div>
            </form>
        </div>
        <!-- </section> -->
    </div>
</div>
@endsection