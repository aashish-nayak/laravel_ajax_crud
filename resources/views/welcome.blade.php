@extends('layouts.main')

@push('title')
    <title>Multiple File Upload</title>
@endpush

@section('main-section')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 mt-5 ">
                <form class="row g-3" action="" id="userForm" enctype="multipart/form-data">
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" required maxlength="100">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" required maxlength="100" >
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control"  required maxlength="15">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label>Role</label>
                            <select name="role" required class="form-control">
                                <option value="">Select a role</option>
                                @foreach ($roles as $role)
                                    <option value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description</label>
                            <textarea name="desc" class="form-control" required ></textarea>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label>Profile Image</label>
                        <input class="form-control" name="profile" type="file" required id="formFileMultiple" accept="image/*">
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="row justify-content-center">
            {{-- <div class="col-10 mt-5">
                <a href="form" class="btn btn-success">Add Data</a>
            </div> --}}
            <div class="col-12">
                <div class="table-responsive py-5">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Role</th>
                                <th scope="col">Profile</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function fetchData(){
            $.ajax({
                url: '{{ url("/api/list") }}',
                type: 'GET',
                success: function(response) {
                    console.log(response);
                    let html = '';
                    $.each(response, function (key, row) { 
                         html += `<tr>
                                <td>${row.id}</td>
                                <td>${row.name}</td>
                                <td>${row.email}</td>
                                <td>${row.phone}</td>
                                <td>${row.role.name}</td>
                                <td>
                                    <img src="storage/${row.profile}" style="width:80px" />   
                                </td>
                            </tr>`;
                    });
                    $('#tableData').html(html);
                },
                error: function(xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let key in errors) {
                        if (errors.hasOwnProperty(key)) {
                            errorMessages += errors[key][0] + '\n';
                        }
                    }
                    alert(errorMessages);
                }
            });
        }
        $(document).ready(function() {
            fetchData();
            $('#userForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: '{{ url("/api/store") }}',
                    type: 'POST',
                    data: formData,
                    enctype: 'multipart/form-data',
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        fetchData();
                        alert('User created successfully!');
                    },
                    error: function(xhr) {
                        let errors = xhr.responseJSON.errors;
                        let errorMessages = '';
                        for (let key in errors) {
                            if (errors.hasOwnProperty(key)) {
                                errorMessages += errors[key][0] + '\n';
                            }
                        }
                        alert(errorMessages);
                    }
                });
            });
            $('#userForm').on('input', function() {
                let valid = true;
                $('#userForm input, #userForm textarea').each(function() {
                    if (!this.checkValidity()) {
                        valid = false;
                        $(this).css('border-color', 'red');
                    } else {
                        $(this).css('border-color', '');
                    }
                });
                $('button[type="submit"]').prop('disabled', !valid);
            });
        });
    </script>
@endsection