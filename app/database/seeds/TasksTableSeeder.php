<?php

class TasksTableSeeder extends Seeder {
	public function run()
	{
		DB::table('tasks')->delete();
		$user = User::first();
		$project = $user->projects->first();

		$tasks = array(
			['name' => 'First Task', 'description' => 'First Task Description', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'user_id' => $user->id, 'project_id' => $project->id]
		);

		DB::table('tasks')->insert($tasks);
	}
}