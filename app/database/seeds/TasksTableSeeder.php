<?php

class TasksTableSeeder extends Seeder {
	public function run()
	{
		DB::table('tasks')->delete();
	}
}