@extends('admin.layouts.default')

@section('title')
    @parent
    Danh sách thể loại sách
@endsection

@push('styles')
@endpush

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    {{-- <div class="p-4" style="min-height: 800px;">
        <form action="{{ route('user_update', $id->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="exampleInputEmail1">Tên người dùng</label>
                <input type="text" class="form-control" name="username" aria-describedby="emailHelp"
                    value="{{ $id->username }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Email</label>
                <input type="text" class="form-control" name="email" aria-describedby="emailHelp"
                    value="{{ $id->email }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Mật khẩu</label>
                <input type="string" class="form-control" name="password" aria-describedby="emailHelp"
                    value="{{ $id->password }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tên đầy đủ</label>
                <input type="text" class="form-control" name="full_name" aria-describedby="emailHelp"
                    value="{{ $id->full_name }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Giới tính</label>
                <select name="gender" class="form-control">
                    <option value="male" {{ $id->gender == 'male' ? 'selected' : '' }}>male</option>
                    <option value="female" {{ $id->gender == 'female' ? 'selected' : '' }}>female</option>
                    <option value="other" {{ $id->gender == 'other' ? 'selected' : '' }}>other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ngày sinh</label>
                <input type="date" class="form-control" name="date_of_birth" aria-describedby="emailHelp"
                    value="{{ $id->date_of_birth }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Ảnh Đại Diện</label>
                <img src="{{ asset('/storage/' . $id->avatar_url) }}" alt="" width="200">
                <input type="file" class="form-control" name="avatar_url" aria-describedby="emailHelp">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Trạng thái</label>
                <select name="status" class="form-control">
                    <option value="active" {{ $id->status == 'active' ? 'selected' : '' }}>active</option>
                    <option value="inactive" {{ $id->status == 'inactive' ? 'selected' : '' }}>inactive</option>
                    <option value="banned" {{ $id->status == 'banned' ? 'selected' : '' }}>banned</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Số xu</label>
                <input type="number" class="form-control" name="coin_earned" aria-describedby="emailHelp"
                    value="{{ $id->coin_earned }}">
            </div>
            <button type="submit" class="btn btn-success">Save</button>
        </form>
    </div> --}}

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Sửa User</h4>
                </div><!-- end card header -->
                <div class="card-body">
                    <form action="{{ route('user_update', $id->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
            
                        @if ($errors->has('error'))
                        <div class="alert alert-danger">
                            {{ $errors->first('error') }}
                        </div>
                    @endif
                    
            
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng</label>
                            <input type="text" class="form-control" name="username" aria-describedby="emailHelp" value="{{ old('username', $id->username) }}">
                            @error('username')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="text" class="form-control" name="email" aria-describedby="emailHelp" value="{{ old('email', $id->email) }}">
                            @error('email')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" aria-describedby="emailHelp" value="{{ old('password', $id->password) }}">
                            @error('password')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Tên đầy đủ</label>
                            <input type="text" class="form-control" name="full_name" aria-describedby="emailHelp" value="{{ old('full_name', $id->full_name) }}">
                            @error('full_name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Giới tính</label>
                            <select name="gender" class="form-control">
                                <option value="male" {{ old('gender', $id->gender) == 'male' ? 'selected' : '' }}>male</option>
                                <option value="female" {{ old('gender', $id->gender) == 'female' ? 'selected' : '' }}>female</option>
                                <option value="other" {{ old('gender', $id->gender) == 'other' ? 'selected' : '' }}>other</option>
                            </select>
                            @error('gender')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Ngày sinh</label>
                            <input type="date" class="form-control" name="date_of_birth" aria-describedby="emailHelp" value="{{ old('date_of_birth', $id->date_of_birth) }}">
                            @error('date_of_birth')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Ảnh Đại Diện</label>
                            <img src="{{ asset('/storage/' . $id->avatar_url) }}" alt="" width="200">
                            <input type="file" class="form-control" name="avatar_url" aria-describedby="emailHelp">
                            @error('avatar_url')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="active" {{ old('status', $id->status) == 'active' ? 'selected' : '' }}>active</option>
                                <option value="inactive" {{ old('status', $id->status) == 'inactive' ? 'selected' : '' }}>inactive</option>
                                <option value="banned" {{ old('status', $id->status) == 'banned' ? 'selected' : '' }}>banned</option>
                            </select>
                            @error('status')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        @if (Auth::id() == 1)
                            <div class="form-group mt-3">
                                <label for="exampleInputEmail1">Role</label>
                                <select name="role_id" class="form-control">
                                    @foreach ($role as $name => $ids)
                                        <option value="{{ $ids }}" {{ old('role_id', $id->role_id) == $ids ? 'selected' : '' }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        @endif
            
                        <div class="form-group mt-3">
                            <label for="exampleInputEmail1">Số xu</label>
                            <input type="number" class="form-control" name="coin_earned" aria-describedby="emailHelp" value="{{ old('coin_earned', $id->coin_earned) }}">
                            @error('coin_earned')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
            
                        <button type="submit" class="mt-3 btn btn-success">Save</button>
                    </form>
                </div>
            </div>
            
        </div>
        <!--end col-->
    </div>
    <!--end row-->
@endsection

@push('scripts')
@endpush
