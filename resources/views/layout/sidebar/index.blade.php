<!-- menu main -->
<div class="main-menu">
    <div class="row mb-4 no-gutters">
        <div class="col-auto"><button class="btn btn-link btn-40 btn-close text-white"><span class="material-icons">chevron_left</span></button></div>
        <div class="col-auto">
            <div class="avatar avatar-40 rounded-circle position-relative">
                <figure class="background">
                    <img src="/default.png" alt="">
                </figure>
            </div>
        </div>
        <div class="col pl-3 text-left align-self-center">
            <h6 class="mb-1">{{ auth()->user()->name }}</h6>
            <p class="small text-default-secondary">{{ auth()->user()->user_type }}</p>
        </div>
    </div>
    <div class="menu-container">
        <div class="row mb-4">
            <div class="col">
                <h4 class="mb-1 font-weight-normal">&#8358; {{ auth()->user()->wallet->balance }}</h4>
                <p class="text-default-secondary">My Balance</p>
            </div>
            <div class="col-auto">
                <button class="btn btn-default btn-40 rounded-circle" data-toggle="modal" data-target="#addmoney"><i class="material-icons">add</i></button>
            </div>
        </div>

        <ul class="nav nav-pills flex-column ">
            <li class="nav-item">
                <a class="nav-link active" href="index.html">
                    <div>
                        <span class="material-icons icon">account_balance</span>
                        Home
                    </div>
                    <span class="arrow material-icons">chevron_right</span>
                </a>
            </li>
        </ul>
        <div class="text-center">
            <a href="{{ route('logout') }}" class="btn btn-outline-danger text-white rounded my-3 mx-auto">Sign out</a>
        </div>
    </div>
</div>