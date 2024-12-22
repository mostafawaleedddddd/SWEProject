// Load data from the database and populate the table
function loadDiscussions() {
    $.ajax({
        url: '../Models/Forum.php',
        type: 'POST',
        data: { action: 'getAllDiscussions' },
        dataType: 'json',
        success: function(data) {
            $('#record').empty();
            data.forEach((item) => {
                if (item.parent_comment == 0) {
                    let row = `
                        <tr>
                            <td>
                                <b>
                                    <img src="avatar.jpg" width="30px" height="30px" />
                                    ${item.student} :<i> ${item.created_at}:</i>
                                </b>
                                <p style="padding-left:80px">
                                    ${item.post}
                                    <br>
                                    <a data-toggle="modal" data-id="${item.id}" class="open-ReplyModal" href="#ReplyModal">Reply</a>
                                </p>
                            </td>
                        </tr>`;
                    $('#record').append(row);

                    data.forEach((reply) => {
                        if (reply.parent_comment == item.id) {
                            let comment = `
                                <tr>
                                    <td style="padding-left:80px">
                                        <b>
                                            <img src="avatar.jpg" width="30px" height="30px" />
                                            ${reply.student} :<i> ${reply.created_at}:</i>
                                        </b>
                                        <p style="padding-left:40px">${reply.post}</p>
                                    </td>
                                </tr>`;
                            $('#record').append(comment);
                        }
                    });
                }
            });
        },
        error: function(jqXHR, textStatus, errorThrown) {
            alert('Error: ' + textStatus + ' - ' + errorThrown);
        }
    });
}

// Post a new discussion
$('#butsave').on('click', function() {
    let name = $('form[name="frm"] input[name="name"]').val();
    let msg = $('form[name="frm"] textarea[name="msg"]').val();
    if (name && msg) {
        $.ajax({
            url: '../Models/Forum.php',
            type: 'POST',
            data: { action: 'saveDiscussion', parent_comment: 0, student: name, post: msg },
            dataType: 'json',
            success: function(response) {
                if (response.error) {
                    alert('Error: ' + response.error);
                } else {
                    $('form[name="frm"]')[0].reset();
                    loadDiscussions();
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('AJAX Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
        alert('Please fill out all fields!');
    }
});

// Handle replies
$('#btnreply').on('click', function() {
    let commentid = $('#commentid').val();
    let name = $('form[name="frm1"] input[name="Rname"]').val();
    let msg = $('form[name="frm1"] textarea[name="Rmsg"]').val();
    if (name && msg) {
        $.ajax({
            url: '../Models/Forum.php',
            type: 'POST',
            data: { action: 'saveDiscussion', parent_comment: commentid, student: name, post: msg },
            success: function() {
                $('form[name="frm1"]')[0].reset();
                $('#ReplyModal').modal('hide');
                loadDiscussions();
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error: ' + textStatus + ' - ' + errorThrown);
            }
        });
    } else {
        alert('Please fill out all fields!');
    }
});

// Load discussions when the page is ready
$(document).ready(function() {
    loadDiscussions();
});
