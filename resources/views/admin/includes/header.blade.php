<div class="top_block">
  
  <div class="top-navbar">
    <a data-original-title="Toggle navigation" class="toggle-side-nav pull-right" href="#">
      <i class="icon-reorder"></i>
    </a>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-xs-12">
        <div class="logo">
          <a href="#"><img src="{{asset('admin/img/logo.png')}}"></a>
          </div><!--logo-->
          </div><!--col-md-4-->
          <div class="col-md-9 col-xs-12">
            <div class="topblo">
              <div class="account">
                <ul class="list_acountdrop list_acountdrop_hsap">
                  <li class="dropup">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      {{ trans('messages.admin')}}<i class="icon-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu_hsap show_drop">
                      @if(App::getLocale() == 'en')
                      <li><a href="{{ url('locale/ar') }}" >{{trans('messages.ar')}}</a></li>
                      @else
                      <li><a href="{{ url('locale/en') }}" >{{trans('messages.en')}}</a></li>
                      @endif
                      
                      <li>
                        <a href="{{route('admin.logout')}}">{{trans('messages.logout')}}</a>
                        </li>
                        </ul><!--dropdown-menu-->
                      </li>
                      </ul><!--list_acountdrop-->
                      </div><!--account-->
                      
                      </div><!--topblo-->
                      </div><!--col-md-4 col-xs-12-->
                      </div><!--row-->
                      </div><!--container-->
                      </div><!--top_block-->