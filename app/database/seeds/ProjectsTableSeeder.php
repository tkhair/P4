<?php

class ProjectsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('projects')->delete();

		$user = User::first();

		$projects = array(
			['name' => 'First Project', 'created_at' => new DateTime, 'updated_at' => new DateTime, 'user_id' => $user->id]
		);

		DB::table('projects')->insert($projects);
	}
}