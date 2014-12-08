<?php

class ProjectsTableSeeder extends Seeder {
	public function run()
	{
		DB::table('projects')->delete();
	}
}