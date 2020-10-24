 <div class="col_side_nav">
    <div id="side-nav">
      <ul id="nav">
          <li class="current"> <a href="{{ route('dashboard') }}"> <i class="icon-dashboard"></i>{{ trans('messages.dashboard') }}</a> </li>
          
          <li><a href="{{ route('category.index') }}"> <i class="icon-list-alt"></i>{{ trans('messages.categories') }}</a></li>
        
          
          <li> <a href="#"> <i class="icon-archive"></i>{{ trans('messages.stores') }} <i class="arrow icon-angle-right"></i></a>
          <ul class="sub-menu">
            <li> <a href="{{ route('store.index') }}"> <i class="icon-angle-left"></i> {{ trans('messages.store.all') }}</a> </li>
            <li> <a href="{{ route('store.create') }}"> <i class="icon-angle-left"></i>  {{ trans('messages.store.add') }}</a> </li>
          </ul>
        </li>

        <li><a href="{{ route('branch.view') }}"> <i class="icon-list-alt"></i>{{ trans('messages.branches') }}</a></li>
        <li><a href="{{ route('voucher') }}"> <i class="icon-archive"></i>{{ trans('messages.vouchers') }}</a></li>

        <li><a href="{{ route('city.index') }}"><i class="icon-home"></i>{{ trans('messages.cities') }}</a></li>

        <li><a href="{{ route('region.index') }}"><i class="icon-home"></i>{{ trans('messages.regions') }}</a></li>

        <li><a href="{{ route('user.index') }}"> <i class="fa fa-users"></i>{{ trans('messages.users') }}</a></li>

        <li><a href="{{ route('card.index') }}"> <i class="fa fa-credit-card-alt"></i>{{ trans('messages.cards') }}</a></li>


        <li><a href="{{ route('setting') }}"> <i class="fa fa-cog" aria-hidden="true"></i>{{ trans('messages.setting') }}</a></li>

        <li> <a href="#"> <i class="icon-desktop"></i>{{ trans('messages.pages') }}<i class="arrow icon-angle-right"></i></a>
          <ul class="sub-menu">
            <li ><a href="{{route('aboutUs')}}">{{ trans('messages.about.us') }}</a></li>
            <li ><a href="{{route('terms')}}">{{ trans('messages.terms') }}</a></li>
            <li ><a href="{{route('faq.index')}}">{{ trans('messages.faq') }}</a></li>
            <li ><a href="{{route('contact')}}">{{ trans('messages.contact.us') }}</a></li>
           
          </ul>
        </li>
      </ul>
    </div>
    <!--side-nav--> 
  </div>