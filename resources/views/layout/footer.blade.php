@php
$route = Route::current()->getName();
@endphp
 <!-- footer-->
 <div class="footer">
    <div class="row no-gutters justify-content-center">
        <div class="col-auto">
            <a href="{{ route('regular.home') }}" class="{{ $route == 'regular.home'?'active':'' }}">
                <i class="material-icons">home</i>
                <p>Home</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('contacts.index') }}" class="{{ $route == 'contacts.index'?'active':'' }}">
                <i class="material-icons">insert_chart_outline</i>
                <p>Beneficiaries</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('add_money') }}" class="{{ $route == 'add_money'?'active':'' }}">
                <i class="material-icons">account_balance_wallet</i>
                <p>Wallet</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('transactions.index') }}" class="{{ $route == 'transactions.index'?'active':'' }}">
                <i class="material-icons">shopping_bag</i>
                <p>History</p>
            </a>
        </div>
        <div class="col-auto">
            <a href="{{ route('profile.index') }}" class="{{ $route == 'profile.index'?'active':'' }}">
                <i class="material-icons">account_circle</i>
                <p>Profile</p>
            </a>
        </div>
    </div>
</div>
