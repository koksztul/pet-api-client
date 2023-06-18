@extends('layouts.app')

@section('body')
<div id="form">
    <h2>Edit Pet</h2>
    <div class="form-group">
        <label for="id">Enter pet id</label>
        <input class="form-control" id="id" name="id" placeholder="id">
    </div>
    <input type=button class="btn btn-primary" id="petIdSubmit" value=Submit>
    <hr>
    <form id="petUpdateForm" method="POST" action="">
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
            <input class="form-control" id="category" name="category" placeholder="category">
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
        <input type=button class="btn btn-primary" id="btnSubmit" value=Update>
    </form>
</div>
@stop

@section('scripts')
<script>
    $("#btnSubmit").on("click", function() {
        document.querySelector("form").submit(); 
    });

    $('#form').on('click', '#petIdSubmit', function (e) {
        var petId = $("#id").val();
        var formActionUrl = '{{ route("pet.update", ":id") }}';
        formActionUrl = formActionUrl.replace(':id', petId);

        $('#petUpdateForm').attr('action', formActionUrl);
        var getPetDataUrl = '{{ route("pet.getPetDataById", ":id") }}';
        getPetDataUrl = getPetDataUrl.replace(':id', petId);

        $.ajax({
            url: getPetDataUrl,
            headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
            type: "POST",
            success: function (result) {
                $("#category").val(result.category.name);
                $("#name").val(result.name);
                $("#photoUrls").val(result.photoUrls);
                var tagsArray = result.tags.map(tag => tag.name);
                var tagsString = tagsArray.join(', ');
                var html = '';  
                result.tags.forEach(tag => {
                    $('#tags').tagsinput('add', tag.name)
                });

                $(".bootstrap-tagsinput").prepend(html);
                $("#tags").val(tagsString);
                $("#status").val(result.status);
            },
            error: function (data) {
            }
        });
    });
</script>
@stop