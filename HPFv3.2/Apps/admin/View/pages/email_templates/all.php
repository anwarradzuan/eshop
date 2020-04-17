<?php
defined("HFA") or die();

new Controller($_POST);

switch(url::get(1)){
    case "":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-list"></span> All Email Templates
            <a href="<?= PORTAL ?>email-templates/add/add" class="btn btn-primary">
                <span class="fa fa-plus"></span> Add new email template
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
            <table class="table table-reponsive table-bordered table-hover data-table">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Code</th>
                        <th class="text-center">User</th>
                        <th class="text-center">Date</th>
                        <th class="text-center">:::</th>
                    </tr>
                </thead>
                
                <tbody>
                <?php
                    $no = 1;
                    foreach(email_template::list(["order" => "e_id DESC"]) as $email){
                    ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center"><?= $email->e_title ?></td>
                        <td class="text-center"><?= $email->e_code ?></td>
                        <td class="text-center"><?= $email->e_user ?></td>
                        <td class="text-center"><?= $email->e_date ?></td>
                        <td class="text-center">
                            <a href="<?= PORTAL ?>email-templates/edit/<?= $email->e_id ?>" class="btn btn-primary">
                                <span class="fa fa-edit"></span>
                            </a>
                            <a href="<?= PORTAL ?>email-templates/delete/<?= $email->e_id ?>" class="btn btn-danger">
                                <span class="fa fa-trash"></span>
                            </a>
                        </td>
                    </tr>
                    <?php
                    }
                ?>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <?php
    break;
    
    case "add":
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-plus"></span>
            Add Client
            
            <a href="<?= PORTAL ?>email-templates" class="btn btn-primary">
                Back
            </a>
        </div>
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                Template Information
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-sm-4 form-group">
                                            Title:
                                            <input class="form-control" type="text" name="title" value="" placeholder="Title" required>
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            Bcc Email:
                                            <input class="form-control" type="text" name="ccmail" value="" placeholder="example: email@gmail.com, email.gmail.com">
                                        </div>
                                        <div class="col-sm-4 form-group">
                                            Code:
                                            <input class="form-control" type="text" name="code" value="" placeholder="Code" required>
                                        </div>
                                    </div>
                                    <div class="row">
	                                    <div class="col-sm-12">
				                        	Content:
				                            <textarea class="form-control details" name="content" id="datails" rows="20" required></textarea>
				                            <br />
				                            <script>
												window.onload = function(){
												    CKEDITOR.replace("content");
												    CKEDITOR.config.height = 500;
												}
											</script><br />
				                        </div>
                            		</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <?php
                            Controller::Form("email_template", ["action" => "add"]);
                        ?>
                        <button class="btn btn-success">
                            <span class="fa fa-save"></span> Save
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
    	$id = url::get(2);
			$et = email_template::getBy(["e_id"=> $id]);
			if(count($et) > 0){
				$et = $et[0];
				?>
				<div class="panel panel-default">
			        <div class="panel-heading">
			            <span class="fa fa-plus"></span>
			            Edit Email Template
			            
			            <a href="<?= PORTAL ?>email-templates" class="btn btn-primary">
			                Back
			            </a>
			        </div>
			        <div class="panel-body">
			            <form action="" method="POST">
			                <div class="row">
			                    <div class="col-md-12">
			                        <div class="panel panel-info">
			                            <div class="panel-heading">
			                                Template Information
			                            </div>
			                            <div class="panel-body">
			                                <div class="form-group">
			                                    <div class="row">
			                                        <div class="col-sm-4 form-group">
			                                            Title:
			                                            <input class="form-control" type="text" name="title" placeholder="Title" value="<?= $et->e_title?>" required>
			                                        </div>
			                                        <div class="col-sm-4 form-group">
			                                            Bcc Email:
			                                            <input class="form-control" type="text" name="ccmail" value="<?= $et->e_ccmail?>" placeholder="example: email@gmail.com, email.gmail.com">
			                                        </div>
			                                        <div class="col-sm-4 form-group">
			                                            Code:
			                                            <input class="form-control" type="text" name="code" value="<?= $et->e_code?>" placeholder="Code" required>
			                                        </div>
			                                    </div>
			                                    <div class="row">
				                                    <div class="col-sm-12">
							                        	Content:
							                            <textarea class="form-control details" name="content" id="datails" rows="20"><?= $et->e_content ?></textarea>
							                            <br />
							                            <script>
															window.onload = function(){
															    CKEDITOR.replace("content");
															    CKEDITOR.config.height = 500;
															}
														</script><br />
							                        </div>
			                            		</div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>
			                    <div class="col-md-12 text-center">
			                        <?php
			                            Controller::Form("email_template", ["action" => "edit"]);
			                        ?>
			                        <button class="btn btn-success">
			                            <span class="fa fa-save"></span> Save
			                        </button>
			                    </div>
			                </div>
			            </form>
			        </div>
			    </div>
				<?php
			}
    	
    break;
    
    case "delete":
        $id = url::get(2);
    ?>
    <div class="panel panel-default">
        <div class="panel-heading">
            <span class="fa fa-trash"></span>
            Delete Email Template
            
            <a href="<?= PORTAL ?>email-templates" class="btn btn-primary">
                Back
            </a>
        </div>
        
        <div class="panel-body">
        <?php
            $email = email_template::getBy(["e_id" => $id]);
            
            if(count($email) > 0){
                $email = $email[0];
            
        ?>
            <form action="" method="POST">
                <h3 class="mt-0">
                    Are you sure?
                </h3>
                
                <p>
                    By clicking below button will remove the selected data <b>'<?= $email->e_title ?>'</b> permanently.
                </p>
                
                <?php
                    Controller::Form(
                        "email_template", 
                        [
                            "action"  => "delete"  
                        ]
                    );
                ?>
                <button class="btn btn-danger">
                    <span class="fa fa-trash"></span>
                    Delete
                </button>
            </form>
        <?php
            }else{
                new Alert("error", "Sorry, selected user not found in our database. Please select a correct user to view information.");
            }
        ?>
        </div>
    </div>
    <?php
    break;
    
    default:
        Page::Load(404);
        break;
}

