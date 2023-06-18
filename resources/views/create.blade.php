@extends('layouts.app')

@section('body')
<div id="form">
    <h2>Create Pet</h2>
    <form method="POST" action="{{ route('pet.store') }}">
        @csrf
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
            <br>
            @json(session('data'))
            </ul>
        </div>
            
        @endif
        @if(session('failed'))
        <div class="alert alert-danger" role="alert">
            {{ session('failed') }}
            <br>
            @json(session('data'))
        </div>
        @endif
        <div class="form-group">
            <label for="category">Category</label>
            <input class="form-control" id="category" name="category" placeholder="category" required>
            @error('category')
            <small class="text-danger">
                {{ $message }}
            </small>  
            @enderror
        </div>
        <div class="form-group">
            <label for="name">Name</label>
            <input class="form-control" id="name" name="name" placeholder="name">
            @error('name')
            <small class="text-danger">
                {{ $message }}
            </small>  
            @enderror
        </div>
        <div class="form-group">
            <label for="photoUrls">Photo Urls</label>
            <input class="form-control" id="photoUrls" name="photoUrls" placeholder="photoUrls">
            @error('photoUrls')
            <small class="text-danger">
                {{ $message }}
            </small>  
            @enderror
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input class="form-control" id="tags" name="tags" placeholder="tags" data-role="tagsinput">
            @error('tags')
            <small class="text-danger">
                {{ $message }}
            </small>  
            @enderror
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input class="form-control" id="status" name="status" placeholder="status">
            @error('status')
            <small class="text-danger">
                {{ $message }}
            </small>  
            @enderror
        </div>
        <input type=button class="btn btn-primary" id="btnSubmit" value=Create>
    </form>
</div>
@stop

@section('scripts')
<script>
    $("#btnSubmit").on("click", function(){
        document.querySelector("form").submit(); 
    });

</script>
@stop