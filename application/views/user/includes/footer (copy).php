<!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.0
    </div>
    <strong>Copyright &copy; 2017 - 2018 <a href="#">Musical Platform</a>.</strong> All rights
    reserved.
  </footer>

</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url();?>/assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>/assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
 
<script src="<?php echo base_url();?>/assets/bootstrapValidator.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url();?>/assets/bower_components/select2/dist/js/select2.full.min.js"></script>

  <?php if($field == 'Datepicker'){ ?>			
			<!-- InputMask -->
			<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.js"></script>
			<script src="<?php echo base_url();?>/assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
			<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
			<!-- date-range-picker -->
			<script src="<?php echo base_url();?>/assets/bower_components/moment/min/moment.min.js"></script>
			<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
			<!-- bootstrap datepicker -->
			<script src="<?php echo base_url();?>/assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
			<!-- bootstrap time picker -->
			<script src="<?php echo base_url();?>/assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
			<!-- SlimScroll -->
			<script src="<?php echo base_url();?>/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
			<!-- iCheck 1.0.1 -->
			<script src="<?php echo base_url();?>/assets/plugins/iCheck/icheck.min.js"></script>
			<!-- Page script -->
			<script>
			  $(function () {
				//Datemask dd/mm/yyyy
				$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' });
				//Datemask2 mm/dd/yyyy
				$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' });
				//Money Euro
				$('[data-mask]').inputmask();
			
				//Date range picker
				$('#reservation').daterangepicker();
				//Date range picker with time picker
				$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' });
				//Date range as a button
				$('#daterange-btn').daterangepicker(
				  {
					ranges   : {
					  'Today'       : [moment(), moment()],
					  'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					  'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
					  'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					  'This Month'  : [moment().startOf('month'), moment().endOf('month')],
					  'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate  : moment()
				  },
				  function (start, end) {
					$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
				  }
				);
			
				//Date picker
				$('#datepicker').datepicker({
				  autoclose: true
				});
			
				//iCheck for checkbox and radio inputs
				$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				  checkboxClass: 'icheckbox_minimal-blue',
				  radioClass   : 'iradio_minimal-blue'
				});
				//Red color scheme for iCheck
				$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				  checkboxClass: 'icheckbox_minimal-red',
				  radioClass   : 'iradio_minimal-red'
				});
				//Flat red color scheme for iCheck
				$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				  checkboxClass: 'icheckbox_flat-green',
				  radioClass   : 'iradio_flat-green'
				});
			
			
			
				//Timepicker
				$('.timepicker').timepicker({
				  showInputs: false
				});
			  });
			</script>
  <?php } ?>
  <?php if($field == 'Datatable'){ ?>			
			<!-- DataTables -->
			<script src="<?php echo base_url();?>/assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
			<script src="<?php echo base_url();?>/assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
			<!-- page script -->
			<script>
			  $(function () {
				$('#dataTable').DataTable();
                $('#dataTable1').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : true,
				  'ordering'    : false,
				  'info'        : false,
				  'autoWidth'   : true,
                  "pageLength": 5
				});
                $('#dataTable2').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : true,
				  'ordering'    : false,
				  'info'        : false,
				  'autoWidth'   : true,
                  "pageLength": 5
				});
                
				$('#dataTable3').DataTable({
				  'paging'      : true,
				  'lengthChange': false,
				  'searching'   : true,
				  'ordering'    : false,
				  'info'        : false,
				  'autoWidth'   : true,
                  "pageLength": 5
				});
			  });
			</script>
  <?php } ?>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>/assets/dist/js/adminlte.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
  });
</script>

<script>
    
    $(document).ready(function() {
        setTimeout(function(){ $("#alert").css("display","none");}, 3000);
	//alert('http://localhost/caroldata.com/hmvc_hotel_booking/registration/register_email_exists');
    $('#add_investor_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
					notEmpty: {
						message : 'The Username Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_username_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This Username is already in use.'     
					 }
				},
			}, 
			contact: {
                validators: {
                    notEmpty: {
                        message: 'The Contact is required and cannot be empty'
                    },
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required and cannot be empty'
                    },
                }
            },
            skills: {
                validators: {
                    notEmpty: {
                        message: 'The Skills is required and cannot be empty'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required and cannot be empty '
					},
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required and cannot be empty '
					},
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });
    
    $('#edit_investor_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
					notEmpty: {
						message : 'The Username Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_username_exists1",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This Username is already in use.'     
					 }
				},
			},
			contact: {
                validators: {
                    notEmpty: {
                        message: 'The Contact is required and cannot be empty'
                    },
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required and cannot be empty'
                    },
                }
            },
            skills: {
                validators: {
                    notEmpty: {
                        message: 'The Skills is required and cannot be empty'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists1/",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {                    
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {                    
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });
    
    $('#add_entrepreneur_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
					notEmpty: {
						message : 'The Username Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_username_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This Username is already in use.'     
					 }
				},
			}, 
			contact: {
                validators: {
                    notEmpty: {
                        message: 'The Contact is required and cannot be empty'
                    },
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required and cannot be empty'
                    },
                }
            },
            companyname: {
                validators: {
                    notEmpty: {
                        message: 'The company name is required and cannot be empty'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required and cannot be empty '
					},
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {
                    notEmpty: {
						message : 'The password Field is required and cannot be empty '
					},
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });
    
    $('#edit_entrepreneur_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            username: {
                validators: {
					notEmpty: {
						message : 'The Username Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>admin/check_username_exists/<?php echo $this->uri->segment(3);?>",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('username').val()
							 };
						},
					 message: 'This Username is already in use.'     
					 }
				},
			},
			contact: {
                validators: {
                    notEmpty: {
                        message: 'The Contact is required and cannot be empty'
                    },
                }
            },
            category: {
                validators: {
                    notEmpty: {
                        message: 'The Category is required and cannot be empty'
                    },
                }
            },
            companyname: {
                validators: {
                    notEmpty: {
                        message: 'The company name is required and cannot be empty'
                    },
                }
            },
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>admin/check_email_exists/<?php echo $this->uri->segment(3);?>",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {                    
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {                    
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });
    
    $('#profile_update_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            f_name: {
                validators: {
                    notEmpty: {
                        message: 'The First name is required and cannot be empty'
                    },
                }
            },
			l_name: {
                validators: {
                    notEmpty: {
                        message: 'The Last name is required and cannot be empty'
                    },
                }
            },
                       
			email: {
                validators: {
					notEmpty: {
						message : 'The email Field is required and cannot be empty '
					},
					 remote: {  
					 type: 'POST',
					 url: "<?php echo site_url();?>user/check_email_exists1",
					 data: function(validator) {
						 return {
							 //email: $('#email').val()
							 email: validator.getFieldElements('email').val()
							 };
						},
					 message: 'This email is already in use.'     
					 }
				},
			},    
			
			password: {
				validators: {                    
					identical: {
                        field: 'repassword',
                        message: 'The password and its confirm are not the same'
                    },
					stringLength: {
						min: 6 ,
						max: 15,
						message: 'The password length min 6 and max 15 character Long'
					}
				}
			},
			repassword: {
				validators: {					
					identical: {
                        field: 'password',
                        message: 'The password and its confirm are not the same'
                    }
					
				}
			},
        }
    });
    
    $('#add_product_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
			title: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required'
                    },
                }
            },
            genre: {
                validators: {
                    notEmpty: {
                        message: 'The Genre is required'
                    },
                }
            },
            file: {
                validators: {
                    notEmpty: {
                        message: 'The Upload File is required'
                    },
                }
            },
        }
    });
    
    $('#edit_video_form').bootstrapValidator({
        //container: '#messages',
        feedbackIcons: {
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },
        fields: {
            
			title: {
                validators: {
                    notEmpty: {
                        message: 'The Title is required and cannot be empty'
                    },
                }
            },            
        }
    });
    
    });
  </script>
  <script>
    $(document).on("click", "#add_more_milestone", function () {
            var img_count = Number($("#milestone_field").val());
            
            if(img_count <= 3){
                img_count = Number(img_count) + 1;
                $("#milestone_field").val(img_count);
                var html = '';
                html += "<div class='row'>";
                html += "<div class='col-sm-3'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>MileStone "+ (img_count-1) +"</label>";
                html += "<input type='number' min='1' class='form-control' id='"+img_count+"' name='milestone_amt[]' placeholder='amount'/>";                
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-3'>";
                html += "<div class='form-group'>";
                html += "<label class='control-label'>&nbsp;</label>";
                html += "<input type='text' class='form-control' id='"+img_count+"' name='milestone_day[]' placeholder='days'/>";
                html += "</div>";
                html += "</div>";
                
                html += "<div class='col-sm-3'>";
                html += "<label class='control-label'>&nbsp;</label>";
                html += "<div class='form-group'>";
                html += "<img src='<?php echo base_url(); ?>assets/dist/img/bt_delete.png' style='cursor:pointer' title='Remove Image' class='remove_img_div'/>";
                html += "</div>";
                html += "</div>";
                html += "</div>";
                $("#milestone_upload_section").append(html);    
            }else{
                alert('You can create maximum 3 milestones.');
            }
            
        });
        
        //remove product image from page
        $(document).on("click", ".remove_img_div", function () {
            var img_count = Number($("#milestone_field").val());
            img_count = Number(img_count) - 1;
            $("#milestone_field").val(img_count);
            $(this).closest(".row").remove();
        });
  </script>
<script>
	CKEDITOR.replace( 'editor1' );
</script>


</body>
</html>