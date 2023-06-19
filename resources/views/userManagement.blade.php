@extends('pattern')

@section('title', 'User Management')

@push('styles')
    <link rel="stylesheet" href="/css/userManagement.css">
    <script>
        fetch('http://127.0.0.1:8000/api/role/get')
            .then(response => response.json())
            .then(role => {
            console.log(role)
            if (role.role === 'reader' || role.role === 'editor')
            location.href = 'http://127.0.0.1:8000/index/index'
            })
    </script>
@endpush

@section('menu-nav-body')
    @push('info-web')
        <h3 class="header">Users</h3>
        <div class="box-control">
            <div class="box-control-search">
                <p class="box-control-search--text">Search:</p>
                <div class="box--type-search">
                    <p class="type-text">All</p>
                    <i class="fa-solid fa-caret-down"></i>
                    <ul class="box--type-search--role">
                        <li class="item-role" data-role="1">Admin</li>
                        <li class="item-role" data-role="2">Editor</li>
                        <li class="item-role" data-role="3">Reader</li>
                    </ul>
                </div>
                <input type="text" name="box--input-search-user" id="">
                <button class="box--btn-search">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </button>
                <button class="box--btn-reset">Reset</button>
            </div>
            <div class="box-control-confirm">
                <div class="box--type-role">
                    <p class="type-text">Role:</p>
                    <i class="fa-solid fa-caret-down"></i>
                    <ul class="box--type-confirm--role">
                        <li class="item-role" data-role="1">Admin</li>
                        <li class="item-role" data-role="2">Editor</li>
                        <li class="item-role" data-role="3">Reader</li>
                        <li class="item-role" data-role="4">Writing restrictions</li>
                    </ul>
                </div>
                <button class="box--btn-confirm">
                    Confirm
                </button>
            </div>
        </div>
        
        <table>
            <thead>
                <tr class="title">
                    <th class="th-title">
                        <input type="checkbox" name="th-checkbox" id="">
                    </th>
                    <th class="th-title">Users Name</th>
                    <th class="th-title">Email</th>
                    <th class="th-title">Roles</th>
                    <th class="th-title">Activity</th>
                    <th class="th-title">Action</th>
                </tr>
            </thead>
        
            <tbody></tbody>
        </table>
    @endpush
    @parent
    
@endsection

@section('footer')
@endsection


@section('codejs')
    @parent
@endsection

@push('js')
    <script src="/js/userManagement.js"></script>
@endpush