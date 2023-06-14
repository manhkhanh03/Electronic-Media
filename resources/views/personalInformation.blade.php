@extends('pattern')

@section('title', 'Personal Information')

@push('styles')
    <link rel="stylesheet" href="/css/personalInformation.css">
@endpush

@section('menu-nav-body')
    @push('info-web')
        <input type="checkbox" name="checkbox-info" id="">
        <span class="title-info">Thông tin cá nhân</span>
        <div class="box-personal-info">
            <div class="box-personal-info--img-name">
                <div class="box-personal-info--img">
                    <img src="" alt="">
                    <label for="file-upload" class="custom-file-upload">
                        <i class="fa fa-cloud-upload"></i> Chọn ảnh
                    </label>
                    <input type="file" name="file-img" id="file-upload">
                </div>
                <div class="box-personal-info--name">
                    <input type="text" name="name-user" id="" value="" disabled>
                    <i class="fa-solid fa-pen edit-name"></i>
                </div>
            </div>

            <div class="box-personal-info--contact">
                <div class="box-personal-info--contact-info">
                    <p>Địa chỉ:</p>
                    <input type="text" name="address" id="">
                </div>
                <div class="box-personal-info--contact-info">
                    <p>Số điện thoại:</p>
                    <input type="number" name="phone-number" id="">
                </div>
                <div class="box-personal-info--contact-info">
                    <p>Email:</p>
                    <input type="email" name="email" id="">
                </div>
            </div>
        </div>

        <div style="width: 100%; height: 1px; background-color: var(--color); margin: 30px 0;"></div>

        <input type="checkbox" name="checkbox-password" id="">
        <span class="title-info" style="margin: 0;">Thay đổi mật khẩu</span>
        <div class="box-personal-info">
            <div class="box-personal-info--img-name">
            </div>

            <div class="box-personal-info--contact">
                <div class="box-personal-info--contact-info">
                    <p>Mật khẩu cũ:</p>
                    <input type="password" name="old-password" id="">
                </div>
                <div class="box-personal-info--contact-info">
                    <p>Mật khẩu mới:</p>
                    <input type="password" name="new-password" id="">
                </div>
                <div class="box-personal-info--contact-info">
                    <p>Xác nhận mật khẩu mới:</p>
                    <input type="password" name="confirm-password" id="">
                </div>
            </div>
        </div>
        <button type="submit">Lưu</button>
    @endpush
    @parent
@endsection

@section('footer')
@endsection

@push('js')
    <script>
        const penEdit = document.querySelector('.edit-name')
        penEdit.onclick = () => {
            document.querySelector('input[name="name-user"]').removeAttribute('disabled')
            document.querySelector('input[name="name-user"]').focus()
        }
    </script>
    <script src="/js/personalInformation.js"></script>
@endpush
