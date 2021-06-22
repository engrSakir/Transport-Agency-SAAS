<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Dashboard</span>
    </a>
</li>
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.chalan.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">চালান সমুহ</span>
    </a>
</li>
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.manager.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Manager</span>
    </a>
</li>
<hr class="bg-share">
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.branch.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Branch</span>
    </a>
</li>
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.company.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Company</span>
    </a>
</li>
<hr class="bg-share">
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.balance.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Balance Add</span>
    </a>
</li>
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.package') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Package</span>
    </a>
</li>
@if(auth()->user()->company->custom_sms_to_random_number)
<li>
    <a class="waves-effect waves-dark" href="{{ route('admin.sms.index') }}">
        <i class="far fa-circle text-success"></i><span class="hide-menu">Send SMS</span>
    </a>
</li>
@endif

