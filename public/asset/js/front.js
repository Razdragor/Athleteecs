/**
 * Created by Max on 05/06/2016.
 */

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(document).ready(function() {
    $('input#post-comment').bind("enterKey",function(e){
        $value = this.value;
        $publication = this.name;
        $input = this;

        $.ajax({
            url: '/comment',
            data: {publication: $publication, value: $value},
            type: 'post',
            success: function(data) {
                if(data['success'] == true)
                {
                    $user = data['user'];
                    $last = $('#comments-'+$publication+' .comment:last');
                     $last.before(
                     "<div class='comment'>" +
                     "<a class='pull-left' href='#'>"+
                     "<img width='30' height='30' class='comment-avatar' alt='"+ $user.firstname + " " + $user.lastname+ "' src='"+ $user.picture + "'>"+
                     "</a>"+
                     "<div class='comment-body'>"+
                     "<span class='message'><strong>"+ $user.firstname + " " + $user.lastname + "</strong> " + $value + "</span>"+
                     "<span class='time'>" + $user.created_at + "</span>"+
                     "</div>"+
                     "</div>");

                    $input.value = "";

                }
                else
                {

                }
            }
        });
    });
    $('input#post-comment').keyup(function(e){
        if(e.keyCode == 13)
        {
            $(this).trigger("enterKey");
        }
    });
});
