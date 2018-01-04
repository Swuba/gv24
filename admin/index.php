<?php
  include 'includes/adminheader.php';
  if (isset($_SESSION['logged_in'])) {
    ?>
    <section id="main">
      <div class="container">
        <div class="row">
          <div class="col-md-3">
            <div class="list-group">
              <a href="index.php" class="list-group-item active main-color-bg">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span> Dashboard
              </a>
              <a href="createtutorial.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Tutorial erstellen</a>
              <a href="edittutorial.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Tutorial bearbeiten</a>
              <a href="createcategory.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Kategorie erstellen</a>
              <a href="editcategory.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Kategorie bearbeiten</a>
              <a href="createuser.php" class="list-group-item"><span class="glyphicon glyphicon-plus" aria-hidden="true"></span> User erstellen</a>
              <a href="edituser.php" class="list-group-item"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> User bearbeiten</a>
              <a href="fileupload.php" class="list-group-item"><span class="	glyphicon glyphicon-plus" aria-hidden="true"></span> Bilder hochladen</a>
              <a href="bilder.php" class="list-group-item"><span class="	glyphicon glyphicon-picture" aria-hidden="true"></span> Bilder anzeigen</a>
            </div>
          </div>
          <div class="col-md-9">
            <!-- Website Overview -->
            <?php
            if (isset($_SESSION['success'])) {
              ?>
              <div class="alert alert-success" role="alert">
               <strong>Erfolgreich</strong> <?php echo $_SESSION['success']; ?>
             </div>
              <?php
              unset($_SESSION['success']);
            }
             ?>
            <div class="panel panel-default">
              <div class="panel-heading main-color-bg">
                <h3 class="panel-title">Website Overview</h3>
              </div>
              <div class="panel-body">
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php
                    $sql = "SELECT * FROM users";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                    ?></h2>
                    <h4>Users</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> <?php
                    $sql = "SELECT * FROM tutorials";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                     ?></h2>
                    <h4>Tutorials</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-th-list" aria-hidden="true"></span> <?php
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    echo $result->num_rows;
                     ?></h2>
                    <h4>Kategorien</h4>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="well dash-box">
                    <h2><span class="glyphicon glyphicon-stats" aria-hidden="true"></span> 0</h2>
                    <h4>Visitors</h4>
                  </div>
                </div>
              </div>
              </div>

              <!-- Latest Users -->
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h3 class="panel-title">Latest Users</h3>
                </div>
                <div class="panel-body">
                  <?php
                  $sql = "SELECT * FROM users ORDER BY id DESC LIMIT 10";
                  $result = mysqli_query($conn, $sql);
                   ?>
                  <table class="table table-striped table-hover">
                      <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Adminlevel</th>
                        <th>Joined</th>
                      </tr>
                      <?php
                      while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php switch ($row['admin']) {
                            case '1':
                              echo "Abonnent";
                              break;
                            case '2':
                              echo "Mitarbeiter";
                              break;
                            case '3':
                              echo "Autor";
                              break;
                            case '4':
                              echo "Redakteur";
                              break;
                            case '5':
                              echo "Admin";
                              break;
                            default:
                              echo "Member";
                              break;
                          } ?></td>
                          <td><?php echo $row['joined']; ?></td>
                        </tr>
                        <?php
                      }
                       ?>

                    </table>
                </div>
              </div>
          </div>
        </div>
      </div>
    </section>
    <?php
  }
 ?>
