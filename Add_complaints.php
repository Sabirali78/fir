<?php 
include("db.php");
include("assets/navbar.php");

// Start session to access session variables
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: user/login.html");
    exit();
}
    
$user_id = $_SESSION['user_id'];

// Fetch the logged-in user's data
$query = "SELECT * FROM users WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$complaints = mysqli_query($conn, "SELECT * FROM complaints WHERE user_id = $user_id");


?>
    <style>
        body {
            background-color: #2d3e50;
            color: #fff;
        }
        .trackheader {
            background-color: navy;
            padding: 20px;
            text-align: center;
        }
        .trackheader .media {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .trackheader .media img {
            height: 100px;
            margin-right: 20px;
        }
        .trackheader h2 {
            font-size: 2rem;
            margin: 0;
        }
        .trackheader span {
            display: block;
            font-size: 1.2rem;
        }
        .card {
            background-color: #fff;
            color: #000;
        }
        .card-header {
            background-color: #ff0000;
            color: #fff;
            text-align: center;
        }
        .btn-blue {
            background-color: #0000ff;
            color: #fff;
        }
        .content {
            padding: 20px;
        }
        #accordion .btn {
            color: #000;
        }
        .list{
            margin-top: 3rem;
        }
        .track_complaint{
            padding-bottom: 3rem;
        }
    </style>
</head>
    <div class="container">
        <div class="trackheader">
            <div class="media">
                <div class="media-left">
                    <img src="https://igp-8787-center.psca.gop.pk/images/publiclogo.png" class="img-responsive" alt="">
                </div>
                <div class="media-body">
                    <h2>Police Complaint Center <span>Inspector General Police, Punjab</span></h2>
                </div>
            </div>
        </div>
        <main class="content">
            <div class="row">
            <div class="col-md-6 ">
    <div class="card track_complaint eqh-card">
        <div class="card-header">
            <h2 class="text-center">Track Your Complaint
                <p><small>CNIC / Tracking No.</small></p>
            </h2>
        </div>
        <div class="card-body">
            <form action="track_complaints.php" method="get">
                <div class="form-group required-field">
                    <label for="cnic">Search by CNIC</label>
                    <input type="text" class="form-control" id="cnic" name="cnic" placeholder="Search by CNIC"
                        maxlength="15">
                </div>
                <div class="form-group required-field">
                    <label for="complaint_no">Search by Tracking No.</label>
                    <input type="text" class="form-control" id="complaint_no" name="complaint_no"
                        placeholder="Search by Tracking No.">
                </div>
                <div class="form-group">
                    <button class="btn btn-blue btn-block btn-lg">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <div class="col-md-6">
                    <div class="card eqh-card">
                        <div class="card-header">
                            <h2 class="text-center">Register Your Complaint </h2>
                        </div>
                        <div class="card-body">
                            <form action="https://igp-8787-center.psca.gop.pk/online/complaint/create" method="post">
                                <input type="hidden" name="_token" value="sAGE2dZLP9wZSDNUdydeO9wSj979YhIyQ8QHJga9">
                                <div class="form-group required-field ">
                                    <label for="">Enter CNIC</label>
                                    <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['CNIC_Number']); ?>" required>
                                    </div>
                                <div class="form-group required-field">
                                    <label for="">Enter Name</label>
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($user['name']); ?>" required>
                                </div>
        
                                <div class="form-group required-field">
                                    <label for="">Enter Cell No.</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo htmlspecialchars($user['phone_number']); ?>">
                                    </div>
                                <div class="form-group">
                                    <button class="btn btn-blue btn-block btn-lg">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card list" id="accordion">
                <div class="card-header">
                    <h2>Complaint List</h2>
                    <div class="box-tools">
                        <button class="btn  btn-sm" data-widget="collapse" data-toggle="collapse" data-parent="#accordion" title="Collapse" href="#collapseOne"><i class="fa fa-minus"></i></button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="modal-header" style="border:unset; ">
                    </div>    
                    <section class="cinfo">
                    </section>
                </div>
            </div>
        </main>
    </div>
<script>
    // Example function for character-only input
function characterOnly(input, event) {
    var key = event.charCode || event.keyCode || 0;
    return (key >= 65 && key <= 90) || (key >= 97 && key <= 122) || key === 32;
}

</script>