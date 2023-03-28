@extends('layouts.main')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= ucwords($head); ?></h1>
  
    <div class="row">
      <div class="col-lg-12">
        <div class="card shadow mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3">
                <div class="nav flex-column nav-pills mb-4" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                  <a class="nav-link active" id="v-pills-common-tab" data-toggle="pill" href="#v-pills-common" role="tab" aria-controls="v-pills-common" aria-selected="true">Common Setting</a>
                  <a class="nav-link" id="v-pills-editprofile-tab" data-toggle="pill" href="#v-pills-editprofile" role="tab" aria-controls="v-pills-editprofile" aria-selected="true">Edit Profile</a>
                  <a class="nav-link" id="v-pills-changepass-tab" data-toggle="pill" href="#v-pills-changepass" role="tab" aria-controls="v-pills-changepass" aria-selected="false">Change Password</a>
                </div>
              </div>
              <div class="col-lg-9 pl-4">
                <div class="tab-content" id="v-pills-tabContent">
                  <div class="tab-pane fade show active" id="v-pills-common" role="tabpanel" aria-labelledby="v-pills-common-tab">
                    <div class="card">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                          <a class="text-dark text-decoration-none btn-block" role="button" href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <i class="far fa-fw fa-clock"></i>
                            &nbsp;
                            <span>Your activity</span>&nbsp;
                            <i class="fas fa-caret-down"></i>
                          </a>
                          <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                            <div class="card-body pt-2 pb-0">
                              <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                  <a class="text-dark text-decoration-none btn-block" href="<?= base_url('setting/likes'); ?>">
                                    <i class="far fa-fw fa-heart"></i>
                                    &nbsp;
                                    <span>Likes</span>
                                  </a>
                                </li>
                                <li class="list-group-item">
                                  <a class="text-dark text-decoration-none btn-block" href="<?= base_url('setting/comments'); ?>">
                                    <i class="far fa-fw fa-comment"></i>
                                    &nbsp;
                                    <span>Comments</span>
                                  </a>
                                </li>
                              </ul>
                            </div>
                          </div>
                        </li>
                        <li class="list-group-item">
                          <a class="text-dark text-decoration-none btn-block" href="<?= base_url('setting/archive'); ?>">
                            <i class="fas fa-fw fa-history"></i>
                            &nbsp;
                            <span>Your archived post</span>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a id="delete-user" class="text-danger text-decoration-none" href="<?= base_url('user/delete_user/') . base64_encode($user['email']); ?>" data-username=" <?= $user['name']; ?> ">
                            <i class="fas fa-fw fa-trash-alt"></i>
                            &nbsp;
                            <span>Delete this account</span>
                          </a>
                        </li>
                        <li class="list-group-item">
                          <a class="text-danger text-decoration-none" href="<?= base_url('auth/logout'); ?>" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-fw fa-sign-out-alt"></i>
                            &nbsp;
                            <span>Logout</span>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                  <div class="tab-pane fade" id="v-pills-editprofile" role="tabpanel" aria-labelledby="v-pills-editprofile-tab">
                    <?php $this->load->view('user/edit'); ?>
                  </div>
                  <div class="tab-pane fade" id="v-pills-changepass" role="tabpanel" aria-labelledby="v-pills-changepass-tab">
                    <?php $this->load->view('setting/change_pass'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
  </div>
  <!-- /.container-fluid -->
  
  </div>
  <!-- End of Main Content -->
  
  <div id="myModal" class="_modal">
    <div class="mdl-content w-100 mdl-img-bg mx-auto"></div>
    <span class="close">&times;</span>
    <img class="mdl-content mdl-image">
  </div>
  
  <script>
    const deleteUserBtn = document.getElementById('delete-user');
  
    deleteUserBtn.addEventListener('click', function(e) {
      e.preventDefault();
  
      Swal.fire({
        icon: 'warning',
        title: 'Are you sure to delete the user?',
        text: `User : ${this.getAttribute('data-username')}`,
        confirmButtonColor: '#DC3545',
        confirmButtonText: 'Yes',
        showCancelButton: true,
        cancelButtonText: 'Cancel',
        reverseButtons: true
      }).then((result) => {
        (result.isConfirmed) ? document.location.href = this.href: Swal.close();
      });
    })
  </script>