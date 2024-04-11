jQuery(document).ready(function ($) {
	var editablePosts = $('.elementor-post, .e-loop-item');
	editablePosts.each(function () {
		var classList = $(this).attr('class').split(/\s+/);
		var postId = null;

		// Find the class that starts with "post-" and extract the ID
		$.each(classList, function (index, className) {
			if (className.startsWith('post-')) {
				postId = className.split('-')[1];
				return false; // Break the loop once the post ID is found
			}
		});

		if (postId) {
			var editUrl = 'http://xaddon.test/wp-admin/post.php?post=' + postId + '&action=edit';
			$(this)
				.children('div')
				.first()
				.append('<a href="' + editUrl + '" class="xn-edit-post-link">Edit Post</a>');
		}
	});
});
