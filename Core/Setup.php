<?php

namespace Exilium\Core;

use XF\AddOn\AbstractSetup;
use XF\AddOn\StepRunnerInstallTrait;
use XF\AddOn\StepRunnerUninstallTrait;
use XF\AddOn\StepRunnerUpgradeTrait;

use XF\Db\Schema\Alter;
use XF\Db\Schema\Create;

class Setup extends AbstractSetup
{
	use StepRunnerInstallTrait;
	use StepRunnerUpgradeTrait;
	use StepRunnerUninstallTrait;

	public function installStep1() {
		// alter the user table adding the field for the hwid
		$this->schemaManager()->alterTable('xf_user', function(Alter $table) {
			$table->addColumn('ex_hwid_id', 'int')->setDefault(NULL)->nullable();
		});
	}

	public function installStep2() {
		// create a table for the hwid
		$this->schemaManager()->createTable('xf_ex_hwid', function(Create $table) {
			// add the id field
			$table->addColumn('hwid_id', 'int')->autoIncrement();

			// add a field for the hwid
			$table->addColumn('hwid', 'varchar', 32)->setDefault('');

			// add a field for the ip
			$table->addColumn('ip', 'varchar', 15)->setDefault('');
		});
	}

	public function uninstallStep1() {
		// drop the column
		$this->schemaManager()->alterTable('xf_user', function(Alter $table) {
			$table->dropColumns('ex_hwid_id');
		});
	}

	//$xf.visitor.canViewClientPanel()

	public function uninstallStep2() {
		// drop the table
		$this->schemaManager()->dropTable('xf_ex_hwid');
	}
}