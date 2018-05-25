var id = 1;

function deletePanel(val){
    $("#subjectList"+val).remove();
}

$('#add_more_subjects').click(function () {

    var functionName = "populatedSubjects("+ id +")";
    var tagsToBeAppended = "<div id='subjectList"+id+"'class='form-row col-md-12'>"+
        "<div class='form-group col-md-4'>"+
        "<label>Select Semester</label>"+
        "<select name='semester_id[]' id='semester_id"+id+"' class='form-control' onchange='"+ functionName + "'>"+
        "<option value='select'>Select...</option>"+

        "</select>"+
        "</div>"+

        "<div class='form-group col-md-4'>"+
        "<label>Select Branch</label>"+
        "<select name='branch_id[]' id='branch_id"+id+"' class='form-control' onchange='"+ functionName + "'>"+
        "<option value='select'>Select...</option>"+

        "</select>"+
        "</div>"+

        "<div class='form-group col-md-3'>"+
        "<label>Select Subject</label>"+
        "<select name='subject_id[]' id='subject_id"+id+"' class='form-control'>"+

        "</select>"+
        "</div>"+


        "<div class='form-group col-md-1'>"+
        "<label>&nbsp;</label>"+
        "<button type='button' class='form-control btn btn-danger' id='delete' onclick='deletePanel("+id+")'><i class='fa fa-trash'></i></button>"+
        "</div>"+
        "</div>";
    $("#batch-panel").append(tagsToBeAppended);

    var branch_id_choice = document.getElementById("branch_id" + id);
    var semester_id_choice = document.getElementById("semester_id"+id);

    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: 'data=branch&manage=addBatch'
    }).done(function(response){
        branch_id_choice.innerHTML = response;
    })

    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: 'data=semester&manage=addBatch'
    }).done(function(response){
        semester_id_choice.innerHTML = response;
    })

    id++;
});



function populatedSubjects(id){
    var semester_id_choice = document.getElementById("semester_id"+id);
    var sem = semester_id_choice.options[semester_id_choice.selectedIndex].value;

    var branch_id_choice = document.getElementById("branch_id"+id);
    var branch = branch_id_choice.options[branch_id_choice.selectedIndex].value;

    window.alert(sem + branch);

    var subject_id_choice = document.getElementById("subject_id"+id);
    subject_id_choice.innerHTML = "<option> Hello </option> <option> Bye </option>";
}

function paginationLinkClicked(page){
    pageNumber = page;
    loadData();
}
function search(searchKey){
    key = searchKey;
    loadData();
}
function loadData(){
    var choice = document.getElementById("num-rows-choice");
    var numRows = choice.options[choice.selectedIndex].value;

    $.ajax({
        type: 'POST',
        url: 'includes/process-ajax-request.php',
        data: 'rows=' + numRows+"&page="+pageNumber+"&key="+key+"&manage=semester"
    }).done(function (response) {
        document.getElementById("semester-info").innerHTML = response;
        pageNumber = 1;

        /*
         The below function is used to create a modal when we press the delete button to delete a Subject entry.
         This is using SweetAlert plugin to create a user friendly modal!
         */
        !function (t) {
            "use strict";
            var n = function () {
            };
            n.prototype.init = function () {
                t(".delete-record").click(function () {
                    var id = $(this).attr('data-record-id');
                    swal({
                        title: "Are you sure, you wanna delete this semester entry?",
                        text: "You won't be able to revert this!",
                        type: "warning",
                        showCancelButton: !0,
                        confirmButtonClass: "btn btn-confirm mt-2",
                        cancelButtonClass: "btn btn-cancel ml-2 mt-2",
                        confirmButtonText: "Yes, delete it!"
                    }).then(function () {
                        $.ajax({
                            type: 'POST',
                            url: 'includes/delete-records.php',
                            data: 'id=' + id+"&manage=semester"
                        }).done(function (response) {

                            swal({
                                title: "Deleted !",
                                text: "Semester has been deleted!",
                                type: "success",
                                confirmButtonClass: "btn btn-confirm mt-2"
                            }).then(function () {
                                self.location = "semester.php";
                            })
                        }).fail(function () {
                            swal({
                                title: "Issue !",
                                text: "There was issue deleteing Semester, please try again later!",
                                type: "error",
                                confirmButtonClass: "btn btn-confirm mt-2"
                            })
                        })
                    })
                })
            }, t.SweetAlert = new n, t.SweetAlert.Constructor = n
        }(window.jQuery),
            function (t) {
                "use strict";
                t.SweetAlert.init()
            }(window.jQuery);

    })
}
loadData();


$(document).ready(function() {
    $('form').parsley();
    $("#datepicker-autoclose").datepicker({
        autoclose: !0,
        todayHighlight: !0
    });
});

