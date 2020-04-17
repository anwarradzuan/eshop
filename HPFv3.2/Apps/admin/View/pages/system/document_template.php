<?php

switch(url::get(2)){
    case "":
    ?>
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-list"></span> Document Template
            <a href="<?= F::URLParams() ?>/add" class="btn btn-sm btn-primary">
                <span class="fa fa-plus"></span> Add new Template
            </a>
        </div>
        
        <div class="panel-body">
            <div class="table-primary">
                <table class="table table-responsive table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">No</th>
                            <th>Name</th>
                            <th>Description</th>
                            <th class="text-center">Code</th>
                            <th class="text-center">:::</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                        $no = 1;
                        foreach(a_document_template::list() as $r){
                    ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $r->d_name ?></td>
                            <td><?= $r->d_description ?></td>
                            <td class="text-center"><?= $r->d_code ?></td>
                            <td class="text-center">
                                <a href="<?= F::URLParams() ?>/edit/<?= $r->d_id ?>" class="btn btn-sm btn-primary">
                                    <span class="fa fa-edit"></span>
                                </a>
                                
                                <a href="<?= F::URLParams() ?>/delete/<?= $r->d_id ?>" class="btn btn-sm btn-danger">
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
    <div class="panel">
        <div class="panel-heading">
            <span class="fa fa-plus"></span> Add new Template
            <a href="<?= PORTAL ?>system/document-template" class="btn btn-primary btn-sm">
                Back
            </a>
        </div>
        
        <div class="panel-body">
            <form action="" method="POST">
                <div class="row">
                    <div class="col-md-6">
                        Name:
                        <input type="text" class="form-control" placeholder="Name" name="name" /><br />
                        
                        Code:
                        <input type="text" class="form-control" placeholder="Code" name="code" /><br />
                    </div>
                    
                    <div class="col-md-6">
                        Description:
                        <textarea class="form-control" placeholder="Description" name="description"></textarea><br />
                    </div>
                    
                    <div class="col-md-12">
                        Content:
                        <textarea class="form-control" placeholder="Content" name="content"></textarea><br />
                    </div>
                    
                    <div class="col-md-12 text-center">
                        <button class="btn btn-sm btn-primary">
                            <span class="fa fa-plus"></span> Add Template
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php
    break;
    
    case "edit":
        
    break;
    
    case "delete":
        
    break;
}