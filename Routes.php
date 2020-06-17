<?php
Route::set('index.php',function(){
    Index::CreateView('Index');
  });

Route::set('login',function(){
    loginAction::CreateView('Login');
    
        });

Route::set('loginAction',function(){
    loginAction::doSomething();
        
            });

Route::set('homeDashboard',function(){
    Home::createTaskDashboard();
        
            });
Route::set('logout',function(){
    Home::logout();
        
            });



Route::set('add-task-action',function(){
    AddTask::addTaskAction();
                    
                        });


                    
Route::set('edit-task-action',function(){
    EditTask::editTaskAction();
    //AddTask::CreateView('AddTask');
                    
                        });
                        
Route::set('delete-task',function(){
    DeleteTask::createTask();
                    
                        });

Route::set('register',function(){
    Register::createTask();
                    
                        });
Route::set('email_verification',function(){
    Register::emailVerification();
 });
                        

Route::set('register-action',function(){
    Register::registerAction();
                    
                        });
Route::set('filterTask-action',function(){
    Home::filterTaskAction();
                    
                        });

Route::set('ask-query-action',function(){
    queryDashboard::askQuery();
    
        });



Route::set('googleLoginAction',function(){
    loginAction::googleLoginAction();
    
        });
Route::set('editProfile',function(){
    EditProfile::createTask();
    
        });
Route::set('editTask',function(){
    EditTask::createTask();
    
        });
Route::set('editProfileAction',function(){
    EditProfile::EditUser();
    
        });
Route::set('twitterLoginAction',function(){
    loginAction::twitterLoginAction();
    
        });

Route::set('queryDashboard',function(){
    queryDashboard::createTask();
    
        });
Route::set('statusAction',function(){
    queryDashboard::statusAction();
    
        });

Route::set('Status',function(){
    addStatus::createTaskDashboard();
    
        });
Route::set('addStatusAction',function(){
    addStatus::createStatus();
            
                });
Route::set('deleteStatusAction',function(){
    addStatus::deleteStatus();
            
                });
Route::set('editStatusAction',function(){
    addStatus::editStatus();
            
                });








?>