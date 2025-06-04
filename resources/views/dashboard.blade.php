@extends('layouts.app')

@section('title', 'User Dashboard')

@section('content')
    <!-- User Dashboard Section Start -->
    <section class="user-dashboard-section section-b-space">
        <div class="container-fluid-lg">
            <div class="row">
                <div class="col-xxl-3 col-lg-4">
                    <div class="dashboard-left-sidebar">
                        <div class="close-button d-flex d-lg-none">
                            <button class="close-sidebar">
                                <i class="fa-solid fa-xmark"></i>
                            </button>
                        </div>
                        <div class="profile-box">
                            <div class="cover-image">
                                <img src="../assets/images/inner-page/cover-img.jpg" class="img-fluid blur-up lazyload"
                                    alt="">
                            </div>

                            <div class="profile-contain">
                                <div class="profile-image">
                                    <div class="position-relative">
                                        <img src="{{ asset('assets/images/logo/logodino2.png') }}"
                                            class="blur-up lazyload update_img" alt="">
                                    </div>
                                </div>

                                <div class="profile-name">
                                    <h3>Bienvenido, {{ auth()->user()->name }}</h3>
                                    <h6 class="text-content">{{ auth()->user()->email }}</h6>
                                </div>
                            </div>
                        </div>

                        <ul class="nav nav-pills user-nav-pills" id="pills-tab" role="tablist">
                            {{-- <li class="nav-item" role="presentation">
                                <a href="#pills-tabContent" class="nav-link active" id="pills-dashboard-tab"
                                    data-bs-toggle="pill" data-bs-target="#pills-dashboard" role="tab"><i
                                        data-feather="home"></i>
                                    DashBoard</a>
                            </li> --}}

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-product-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-product" type="button" role="tab"><i
                                        data-feather="shopping-bag"></i>Products</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"><i
                                        data-feather="user"></i>
                                    Profile</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-security-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-security" type="button" role="tab"><i
                                        data-feather="settings"></i>
                                    Setting</button>
                            </li>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-out-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-out" type="button" role="tab"><i data-feather="log-out"></i>
                                    Log Out</button>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-xxl-9 col-lg-8">
                    <button class="btn left-dashboard-show btn-animation btn-md fw-bold d-block mb-4 d-lg-none">Show
                        Menu</button>
                    <div class="dashboard-right-sidebar">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-product" role="tabpanel">
                                <div class="product-tab">
                                    <div class="title">
                                        <h2>All Product</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="table-responsive dashboard-bg-box">
                                        <table class="table product-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Images</th>
                                                    <th scope="col">Product Name</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Stock</th>
                                                    <th scope="col">Sales</th>
                                                    <th scope="col">Edit / Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="product-image">
                                                        <img src="../assets/images/vegetable/product/1.png"
                                                            class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        <h6>Fantasy Crunchy Choco Chip Cookies</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="theme-color fw-bold">$25.69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>63</h6>
                                                    </td>
                                                    <td>
                                                        <h6>152</h6>
                                                    </td>
                                                    <td class="edit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td class="product-image">
                                                        <img src="../assets/images/vegetable/product/7.png"
                                                            class="img-fluid" alt="">
                                                    </td>
                                                    <td>
                                                        <h6>SnackAmor Combo Pack of Jowar Stick and Jowar Chips</h6>
                                                    </td>
                                                    <td>
                                                        <h6 class="theme-color fw-bold">$25.69</h6>
                                                    </td>
                                                    <td>
                                                        <h6>63</h6>
                                                    </td>
                                                    <td>
                                                        <h6>152</h6>
                                                    </td>
                                                    <td class="edit-delete">
                                                        <i data-feather="edit" class="edit"></i>
                                                        <i data-feather="trash-2" class="delete"></i>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>

                                        <nav class="custom-pagination">
                                            <ul class="pagination justify-content-center">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="javascript:void(0)" tabindex="-1">
                                                        <i class="fa-solid fa-angles-left"></i>
                                                    </a>
                                                </li>
                                                <li class="page-item active">
                                                    <a class="page-link" href="javascript:void(0)">1</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)">2</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)">3</a>
                                                </li>
                                                <li class="page-item">
                                                    <a class="page-link" href="javascript:void(0)">
                                                        <i class="fa-solid fa-angles-right"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                <div class="dashboard-profile">
                                    <div class="title">
                                        <h2>My Profile</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="profile-tab dashboard-bg-box">
                                        <div class="dashboard-title dashboard-flex">
                                            <h3>Profile Name</h3>
                                            <button class="btn btn-sm theme-bg-color text-white"
                                                onclick="window.location='{{ route('profile.edit') }}'">Edit
                                                Profile</button>
                                        </div>

                                        <ul>
                                            <li>
                                                <h5>Company Name :</h5>
                                                <h5>Grocery Store</h5>
                                            </li>
                                            <li>
                                                <h5>Email Address :</h5>
                                                <h5>joshuadbass@rhyta.com</h5>
                                            </li>
                                            <li>
                                                <h5>Country / Region :</h5>
                                                <h5>107 Veltri Drive</h5>
                                            </li>

                                            <li>
                                                <h5>Year Established :</h5>
                                                <h5>2022</h5>
                                            </li>

                                            <li>
                                                <h5>Total Employees :</h5>
                                                <h5>154 - 360 People</h5>
                                            </li>
                                            <li>
                                                <h5>Category :</h5>
                                                <h5>Grocery</h5>
                                            </li>

                                            <li>
                                                <h5>Street Address :</h5>
                                                <h5>234 High St</h5>
                                            </li>

                                            <li>
                                                <h5>City / State :</h5>
                                                <h5>107 Veltri Drive</h5>
                                            </li>

                                            <li>
                                                <h5>Zip :</h5>
                                                <h5>B23 6SN</h5>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="pills-security" role="tabpanel">
                                <div class="dashboard-privacy">
                                    <div class="title">
                                        <h2>My Setting</h2>
                                        <span class="title-leaf">
                                            <svg class="icon-width bg-gray">
                                                <use xlink:href="../assets/svg/leaf.svg#leaf"></use>
                                            </svg>
                                        </span>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Notifications</h3>
                                        </div>

                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="desktop"
                                                    name="desktop" checked="">
                                                <label class="form-check-label ms-2" for="desktop">Show
                                                    Desktop Notifications</label>
                                            </div>
                                        </div>

                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="enable"
                                                    name="desktop">
                                                <label class="form-check-label ms-2" for="enable">Enable
                                                    Notifications</label>
                                            </div>
                                        </div>

                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="activity"
                                                    name="desktop">
                                                <label class="form-check-label ms-2" for="activity">Get
                                                    notification for my own activity</label>
                                            </div>
                                        </div>

                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="dnd"
                                                    name="desktop">
                                                <label class="form-check-label ms-2" for="dnd">DND</label>
                                            </div>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Save
                                            Changes</button>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Deactivate Account</h3>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="concern"
                                                    name="concern">
                                                <label class="form-check-label ms-2" for="concern">I have a privacy
                                                    concern</label>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="temporary"
                                                    name="concern">
                                                <label class="form-check-label ms-2" for="temporary">This is
                                                    temporary</label>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="other"
                                                    name="concern">
                                                <label class="form-check-label ms-2" for="other">other</label>
                                            </div>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Deactivate
                                            Account</button>
                                    </div>

                                    <div class="dashboard-bg-box">
                                        <div class="dashboard-title mb-4">
                                            <h3>Delete Account</h3>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="usable"
                                                    name="usable">
                                                <label class="form-check-label ms-2" for="usable">No longer
                                                    usable</label>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="account"
                                                    name="usable">
                                                <label class="form-check-label ms-2" for="account">Want to switch on
                                                    other
                                                    account</label>
                                            </div>
                                        </div>
                                        <div class="privacy-box">
                                            <div
                                                class="form-check custom-form-check custom-form-check-2 d-flex align-items-center">
                                                <input class="form-check-input" type="radio" id="other-2"
                                                    name="usable">
                                                <label class="form-check-label ms-2" for="other-2">Other</label>
                                            </div>
                                        </div>

                                        <button class="btn theme-bg-color btn-md fw-bold mt-4 text-white">Delete My
                                            Account</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- User Dashboard Section End -->
@endsection
