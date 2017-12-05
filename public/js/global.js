function hasLectures(e) {
    if (e == 1) {
        document.getElementById('duration_blok').style.display = 'none';
        document.getElementById('url_video_blok').style.display = 'none';
    } else if (e == 2) {
        document.getElementById('duration_blok').style.display = '';
        document.getElementById('url_video_blok').style.display = '';
    }
}

function enrolling(course, user) {
    if($("#enrolls-"+course).hasClass("fa fa-bookmark")) {
        unenroll(course, user)
    } else {                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/api/enrolls",
            type: "POST",
            data: {course_id: course, email: user},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // Handle the complete event
                console.log(res)
                $('#usercount-'+course).html(res.responseText+' Peserta');
                $("#enrolls-"+course).removeClass("fa fa-bookmark-o").addClass("fa fa-bookmark");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
        })
    }
}
function unenroll(course, user) {
    if($("#enrolls-"+course).hasClass("fa fa-bookmark-o")) {
        enrolling(course, user)
    } else { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/api/unenrolls",
            type: "POST",
            data: {course_id: course, email: user},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // Handle the complete event
                $('#usercount-'+course).html(res.responseText+' Peserta');
                $("#enrolls-"+course).removeClass("fa fa-bookmark").addClass("fa fa-bookmark-o");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
        })
    }
}
function banUser(id) {
    if($('#check-'+id).hasClass("btn-success")) {
        unBanUser(id)
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function(){
        $.ajax({
            url: "/api/banned",
            type: "POST",
            data: {id: id},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // console.log(res.responseText)
                // Handle the complete event
                $('#check-'+id).removeClass("btn-warning").addClass("btn-success");
                $('#icon-'+id).removeClass("fa-close").addClass("fa-check");
                $('#text-'+id).empty();
                $('#text-'+id).html(res.responseText);
                // $("#enrolls-"+course).removeClass("fa fa-bookmark").addClass("fa fa-bookmark-o");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
        })
    }, 1000);
}
function unBanUser(id) {
    if($('#check-'+id).hasClass("btn-warning")) {
        banUser(id)
    }
    

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    setTimeout(function(){
        $.ajax({
            url: "/api/unbanned",
            type: "POST",
            data: {id: id},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // console.log(res)
                // Handle the complete event
                $('#check-'+id).removeClass("btn-success").addClass("btn-warning");
                $('#icon-'+id).removeClass("fa-check").addClass("fa-close");
                $('#text-'+id).empty();
                $('#text-'+id).html(res.responseText);
                // $("#enrolls-"+course).removeClass("fa fa-bookmark").addClass("fa fa-bookmark-o");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
    })
    },1000);
}
function showMore(topic, user_id, email) {
$('#topic-more-'+topic).hide();
$('#sk-cube-grid'+topic).show();
var row = $('#topic-show-'+topic).val();

$.ajaxSetup({async:false});

if(topic == 'last' || topic == 'search') {
    var url = "showlast"
} else {
    var url = "showmore"
}
// console.log(url)

$.get('/api/'+url+'/'+topic+'/'+row, function(data, status){
    console.log(data)
    for(var i in data) {
        // console.log(data[i])
        var course_id = data[i].id
        var user_enroll = ""
        $.get('/api/enrolled/'+course_id+'/'+email, function(res){
            user_enroll = res;
        });
        var name = data[i].name
        var slug = data[i].slug
        var url_foto = data[i].url_foto
        var count = data[i].count
        var code = data[i]['topics'].code
        var teacher = data[i]['teachers'].name
        var idTeacher = data[i]['teachers'].id
        var teachers = '<a href=/teacher/'+idTeacher+'>'+teacher+'</a>';

        if(data[i]['teachers3'] !== null) {
            var idTeacher2 = data[i]['teachers2'].id
            var idTeacher3 = data[i]['teachers3'].id
            var teacher2 = data[i]['teachers2'].name
            var teacher3 = data[i]['teachers3'].name
            teachers = '<a href=/teacher/'+idTeacher+'>'+teacher+'</a>, <a href=/teacher/'+idTeacher2+'>'+teacher2+'</a>', '<a href=/teacher/'+idTeacher3+'>'+teacher3+'</a>';
        } else if(data[i]['teachers2'] !== null) {
            var idTeacher2 = data[i]['teachers2'].id
            var teacher2 = data[i]['teachers2'].name
            teachers = '<a href=/teacher/'+idTeacher+'>'+teacher+'</a>, <a href=/teacher/'+idTeacher2+'>'+teacher2+'</a>';
        }

        var html = '<div class="col-md-3 col-xs-6">'
            html += '<div class="frame-materi" data-target="button-frame-2-1">'
            html += '<img src="/uploads/course/'+url_foto+'" class="img">'
            html += '<div class="text-pengajar">'
            html += '<h4>'+code+'</h4>'
            html += '<h4><a href="/course/"'+slug+'>'+name+'</a></h4>'
            html += '<span>Pengajar: '+teachers+'</span>'
            html += '</div>'
            html += '<div class="row footer-pengajar">'
            html += '<div class="col-sm-10 col-xs-10">'
            html += '<span class="text">'+count+' Peserta</span>'
            html += '</div>'
            html += '<div class="col-sm-2 col-xs-2">'
            if(user_id !== '') {
                if(user_enroll > 0) {
                    html += '<a href="javascript:void(0)" onclick="unenroll('+course_id+', '+email+')">'
                    html += '<span id="enrolls-"'+course_id+' class="fa fa-bookmark" aria-hidden="true"></span>'
                    html += '</a>'
                } else {
                    html += '<a href="javascript:void(0)" onclick="enrolling('+course_id+', '+email+')">'
                    html += '<span id="enrolls-"'+course_id+' class="fa fa-bookmark-o" aria-hidden="true"></span>'
                    html += '</a>'
                }
            } else {
                html += '<a href="javascript:void(0)">'
                html += '<span class="fa fa-bookmark-o" aria-hidden="true" data-toggle="modal" data-target=".bs-example-modal-lg"></span>'
                html += '</a>'
            }
            html += '</div>'
            html += '</div>'
            html += '</div>'
            html += '</div>'

        $('#sk-cube-grid'+topic).hide();
        $('#topic-more-'+topic).show();

        $('#topic-'+topic).append(html);
    }
    $('#topic-show-'+topic).val(parseInt($('#topic-show-'+topic).val()) + 1);
});
}

function chapterOptions(course) {
    $.get('/api/chapters/'+course, function(data, status){
        console.log(data)
        var select = '<select name=chapter_id class=form-control>'
        for (var i in data){
            console.log(data[i])
            var id = data[i].id
            var name = data[i].name
            select += '<option value='+id+'>'+name+'</option>'
        }
        select += '</select>'
        $('#chapter-options').html(select);
    });
}

function like(course, user) {
    if($("#likes-"+course).hasClass("fa fa-thumbs-up")) {
        unlike(course, user)
    } else {                
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/api/like",
            type: "POST",
            data: {course_id: course, user_id: user},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // Handle the complete event
                $('#userlike-'+course).html(res.responseText+' Likes');
                $("#likes-"+course).removeClass("fa fa-thumbs-o-up").addClass("fa fa-thumbs-up");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
        })
    }
}
function unlike(course, user) {
    if($("#likes-"+course).hasClass("fa fa-thumbs-o-up")) {
        like(course, user)
    } else { 
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/api/unlike",
            type: "POST",
            data: {course_id: course, user_id: user},
            dateType: 'json',
            // contentType: "application/json",
            sucess: function (res) {
                console.log(res)
            }, 
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            },
            complete: function (res) {
                // Handle the complete event
                $('#userlike-'+course).html(res.responseText+' Likes');
                $("#likes-"+course).removeClass("fa fa-thumbs-up").addClass("fa fa-thumbs-o-up");
                // console.log('aaaaaaaaaaaaaaaaaaaaaaa');
            }
        })
    }
}
