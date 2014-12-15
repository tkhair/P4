$(function(){
	$.ajaxSetup({
		headers: {
			'X-CSRF-Token': $('meta[name="_token"]').attr('content')
		}
	});

	$('[data-task-toggle-url]').on('click', function(){
		$.post($(this).data('task-toggle-url'), function(response){
			var $task = $('[data-task="' + response.task.id + '"]'),
				$taskCompleted = $('[data-completed-task="' + response.task.id + '"]'),
				$taskCompletedAt = $('[data-completed-at="' + response.task.id + '"]');

			if(response.task.completed_at){
				$task.removeClass('task-incomplete').addClass('task-completed');
				$taskCompletedAt.text(response.task.completed_at.date);
				$taskCompleted.removeClass('hidden');
			} else {
				$task.removeClass('task-completed').addClass('task-incomplete');
				$taskCompleted.addClass('hidden');
			}
		});
	});
});