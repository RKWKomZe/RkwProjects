#
# Table structure for table 'tx_rkwprojects_domain_model_projects'
#
CREATE TABLE tx_rkwprojects_domain_model_projects (

	uid int(11) NOT NULL auto_increment,
	pid int(11) DEFAULT '0' NOT NULL,

	name varchar(255) DEFAULT '' NOT NULL,
	short_name varchar(255) DEFAULT '' NOT NULL,
	internal_name varchar(255) DEFAULT '' NOT NULL,
	visibility int(11) unsigned DEFAULT '0' NOT NULL,
	partner_logos int(11) unsigned DEFAULT '0' NOT NULL,
	project_pid varchar(255) DEFAULT '' NOT NULL,
	project_staff int(11) unsigned DEFAULT '0' NOT NULL,
	project_manager int(11) unsigned DEFAULT '0' NOT NULL,
	sys_category varchar(255) DEFAULT '' NOT NULL,

	tstamp int(11) unsigned DEFAULT '0' NOT NULL,
	crdate int(11) unsigned DEFAULT '0' NOT NULL,
	cruser_id int(11) unsigned DEFAULT '0' NOT NULL,
	deleted tinyint(4) unsigned DEFAULT '0' NOT NULL,
	hidden tinyint(4) unsigned DEFAULT '0' NOT NULL,
	starttime int(11) unsigned DEFAULT '0' NOT NULL,
	endtime int(11) unsigned DEFAULT '0' NOT NULL,

	t3ver_oid int(11) DEFAULT '0' NOT NULL,
	t3ver_id int(11) DEFAULT '0' NOT NULL,
	t3ver_wsid int(11) DEFAULT '0' NOT NULL,
	t3ver_label varchar(255) DEFAULT '' NOT NULL,
	t3ver_state tinyint(4) DEFAULT '0' NOT NULL,
	t3ver_stage int(11) DEFAULT '0' NOT NULL,
	t3ver_count int(11) DEFAULT '0' NOT NULL,
	t3ver_tstamp int(11) DEFAULT '0' NOT NULL,
	t3ver_move_id int(11) DEFAULT '0' NOT NULL,
	sorting int(11) DEFAULT '0' NOT NULL,

	sys_language_uid int(11) DEFAULT '0' NOT NULL,
	l10n_parent int(11) DEFAULT '0' NOT NULL,
	l10n_diffsource mediumblob,

	PRIMARY KEY (uid),
	KEY parent (pid),
	KEY t3ver_oid (t3ver_oid,t3ver_wsid),
 KEY language (l10n_parent,sys_language_uid)

);

#
# Table structure for table 'pages'
#
CREATE TABLE pages (

	tx_rkwprojects_project_uid int(11) unsigned DEFAULT '0',
);

#
# Table structure for table 'sys_file_metadata'
#
CREATE TABLE sys_file_metadata (

	tx_rkwprojects_project_uid int(11) unsigned DEFAULT '0' NOT NULL,

);

#
# Table structure for table 'tx_rkwprojects_projects_authors_mm'
#
CREATE TABLE tx_rkwprojects_projects_authors_mm (
	uid_local int(11) unsigned DEFAULT '0' NOT NULL,
	uid_foreign int(11) unsigned DEFAULT '0' NOT NULL,
	sorting int(11) unsigned DEFAULT '0' NOT NULL,
	sorting_foreign int(11) unsigned DEFAULT '0' NOT NULL,

	KEY uid_local (uid_local),
	KEY uid_foreign (uid_foreign)
);

