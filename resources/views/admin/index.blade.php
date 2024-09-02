@extends('layouts.admin')

@section('content_header')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Messages</span>
                            <span class="info-box-number">1,410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-success"><i class="far fa-flag"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Bookmarks</span>
                            <span class="info-box-number">410</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-warning"><i class="far fa-copy"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Uploads</span>
                            <span class="info-box-number">13,648</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger"><i class="far fa-star"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Likes</span>
                            <span class="info-box-number">93,139</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>PLANTEL ADMINISTRATIVO</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="card card-solid">
        <div class="card-body pb-0">
            <div class="row" style="justify-content: space-between">
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>{{Auth::user()->name}}</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee
                                        Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                            Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    {{-- <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                        class="img-circle img-fluid"> --}}
                                    @if(Auth::user()->image && Storage::disk('public')->exists(Auth::user()->image))
                                        <img src="{{ Storage::url(Auth::user()->image) }}" class="img-circle img-fluid" alt="{{ Auth::user()->name }}'s image">
                                    @else
                                        <img src="{{ Storage::url('usuario_imagen/user_default.png') }}" class="img-circle img-fluid" alt="Default Image">
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee
                                        Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span>
                                            Address: Demo Street 123, Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist / Coffee
                                        Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Address: Demo Street 123,
                                            Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist /
                                        Coffee Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i
                                                    class="fas fa-lg fa-building"></i></span> Address: Demo Street 123,
                                            Demo City 04312, NJ</li>
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user2-160x160.jpg" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                            Digital Strategist
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-7">
                                    <h2 class="lead"><b>Nicole Pearson</b></h2>
                                    <p class="text-muted text-sm"><b>About: </b> Web Designer / UX / Graphic Artist /
                                        Coffee Lover </p>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                            Phone #: + 800 - 12 12 23 52</li>
                                    </ul>
                                </div>
                                <div class="col-5 text-center">
                                    <img src="../../dist/img/user1-128x128.jpg" alt="user-avatar"
                                        class="img-circle img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="#" class="btn btn-sm bg-teal">
                                    <i class="fas fa-comments"></i>
                                </a>
                                <a href="#" class="btn btn-sm btn-primary">
                                    <i class="fas fa-user"></i> View Profile
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
