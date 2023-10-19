<?php include("../config/config.php");
if($_SESSION['admin_id']=="") {
	header("location:index.php");
}
$select_project_total_count = mysqli_query($GLOBALS['conn'], "SELECT COUNT(id) AS cnt FROM projects WHERE is_published=1");
$rs_project_total_count = mysqli_fetch_object($select_project_total_count);
$total_no_of_projects = $rs_project_total_count->cnt;

$select_donations_total_count = mysqli_query($GLOBALS['conn'], "SELECT COUNT(id) AS cnt FROM donations");
$rs_donations_total_count = mysqli_fetch_object($select_donations_total_count);
$total_donations = $rs_donations_total_count->cnt;

$select_subscribers_total_count = mysqli_query($GLOBALS['conn'], "SELECT COUNT(id) AS cnt FROM newsletter_subscription WHERE is_approved=1");
$rs_subscribers_total_count = mysqli_fetch_object($select_subscribers_total_count);
$total_subscribers = $rs_subscribers_total_count->cnt;

$select_sponsors_total_count = mysqli_query($GLOBALS['conn'], "SELECT COUNT(id) AS cnt FROM sponsors WHERE is_published=1");
$rs_sponsors_total_count = mysqli_fetch_object($select_sponsors_total_count);
$total_sponsors = $rs_sponsors_total_count->cnt; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dashboard | <?php echo $GLOBALS['sitename']; ?></title>
  <?php include("includes/head_templates.php"); ?>  
</head>
<body class="sidebar-dark">
  <div class="container-scroller">    
    <!-- partial:partials/_navbar.html -->
    <?php include("header.php"); ?>  
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->      
      <div id="right-sidebar" class="settings-panel">
        <i class="settings-close ti-close"></i>
        <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
          <li class="nav-item">
            <a class="nav-link active" id="todo-tab" data-bs-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" id="chats-tab" data-bs-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
          </li>
        </ul>
        <div class="tab-content" id="setting-content">
          <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
            <div class="add-items d-flex px-3 mb-0">
              <form class="form w-100">
                <div class="form-group d-flex">
                  <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                  <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                </div>
              </form>
            </div>
            <div class="list-wrapper px-3">
              <ul class="d-flex flex-column-reverse todo-list">
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Team review meeting at 3.00 PM
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Prepare for presentation
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Resolve all the low priority tickets due today
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Schedule meeting for next week
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Project review
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 11 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
              <p class="text-gray mb-0">build a js based app</p>
            </div>
            <div class="events pt-4 px-3">
              <div class="wrapper d-flex mb-2">
                <i class="ti-control-record text-primary me-2"></i>
                <span>Feb 7 2018</span>
              </div>
              <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
              <p class="text-gray mb-0 ">Call Sarah Graves</p>
            </div>
          </div>
          <!-- To do section tab ends -->
          <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
            <div class="d-flex align-items-center justify-content-between border-bottom">
              <p class="settings-heading border-top-0 mb-3 ps-3 pt-0 border-bottom-0 pb-0">Friends</p>
              <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
            </div>
            <ul class="chat-list">
              <li class="list active">
                <div class="profile"><img src="<?php echo $GLOBALS['admin_webroot']; ?>images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Thomas Douglas</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">19 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <div class="wrapper d-flex">
                    <p>Catherine</p>
                  </div>
                  <p>Away</p>
                </div>
                <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                <small class="text-muted my-auto">23 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?php echo $GLOBALS['admin_webroot']; ?>images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Daniel Russell</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">14 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?php echo $GLOBALS['admin_webroot']; ?>images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                <div class="info">
                  <p>James Richardson</p>
                  <p>Away</p>
                </div>
                <small class="text-muted my-auto">2 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?php echo $GLOBALS['admin_webroot']; ?>images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Madeline Kennedy</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">5 min</small>
              </li>
              <li class="list">
                <div class="profile"><img src="<?php echo $GLOBALS['admin_webroot']; ?>images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                <div class="info">
                  <p>Sarah Graves</p>
                  <p>Available</p>
                </div>
                <small class="text-muted my-auto">47 min</small>
              </li>
            </ul>
          </div>
          <!-- chat tab ends -->
        </div>
      </div>
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <?php include("left_menu.php"); ?>  
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">Welcome <?php echo ucfirst($_SESSION['admin_username']); ?></h3>
                  <!--<h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>-->
                </div>                
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="<?php echo $GLOBALS['admin_webroot']; ?>images/people.svg" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-0 font-weight-normal"><i class="icon-sun me-2"></i></h2>
                      </div>
                      <div class="ms-2">
                        <h4 class="location font-weight-normal">Pulari Eco</h4>
                        <h6 class="font-weight-normal">Foundation</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6 grid-margin transparent">
              <div class="row">
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-tale">
                    <div class="card-body">
                      <p class="mb-4">Total No.of Projects</p>
                      <p class="fs-30 mb-2"><?php echo $total_no_of_projects; ?></p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 mb-4 stretch-card transparent">
                  <div class="card card-dark-blue">
                    <div class="card-body">
                      <p class="mb-4">Total No.of Donations</p>
                      <p class="fs-30 mb-2"><?php echo $total_donations; ?></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
                  <div class="card card-light-blue">
                    <div class="card-body">
                      <p class="mb-4">Number of Subscribers</p>
                      <p class="fs-30 mb-2"><?php echo $total_subscribers; ?></p>
                      <p></p>
                    </div>
                  </div>
                </div>
                <div class="col-md-6 stretch-card transparent">
                  <div class="card card-light-danger">
                    <div class="card-body">
                      <p class="mb-4">Number of Sponsors</p>
                      <p class="fs-30 mb-2"><?php echo $total_sponsors; ?></p>
                      <p></p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>                    
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title">Projects</p>
                  <div class="table-responsive">
                    <table class="table table-striped table-borderless expandable-table">
                      <thead>
                        <tr>
                          <th>ID #</th>
                        <th>Heading</th> 
                        <th>Green Text Heading</th>                                  
                        <th>Image</th>
                        </tr>  
                      </thead>
                      <tbody>
                      	<?php
						$i = 1;
						$select_project = mysqli_query($GLOBALS['conn'], "SELECT id, title, sub_title, image, is_published, created_date FROM projects ORDER BY id DESC");
						while($result_project = mysqli_fetch_array($select_project)) { ?>
                        <tr>
                          <td><?php echo $i; ?></td>	
                          <td><?php echo $result_project['title']; ?></td>
                          <td><?php echo $result_project['sub_title']; ?></td>
                          <td><img src="<?php echo $GLOBALS['webroot']."uploads/project_images/".$result_project['image']; ?>" width="120" height="102"></td>                          
                        </tr> 
                        <?php 
							$i++;
						 } ?>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>            
          </div>                    
        </div>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include("footer.php"); ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
<?php include("includes/footer_scripts.php"); ?>  
  
</body>
</html>