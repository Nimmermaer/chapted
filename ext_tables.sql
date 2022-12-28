#
# Table structure for table 'fe_users'
#
CREATE TABLE fe_users
(
    move            int(11) unsigned DEFAULT '0' NOT NULL,
    challenge       int(11) unsigned DEFAULT '0' NOT NULL,
    wins            varchar(255) DEFAULT '' NOT NULL,
    lose            varchar(255) DEFAULT '' NOT NULL,
    custom_color    varchar(255) DEFAULT '' NOT NULL,
    custom_profil   int(11) DEFAULT '0' NOT NULL,
    challenges      int(11) unsigned DEFAULT '0' NOT NULL,
    tx_extbase_type varchar(255) DEFAULT '' NOT NULL,
);

#
# Table structure for table 'tx_chapted_domain_model_move'
#
CREATE TABLE tx_chapted_domain_model_move
(
    challenge   int(11) unsigned DEFAULT '0' NOT NULL,
    media       tinytext,
    description text NOT NULL,
    point       int(11) DEFAULT '0' NOT NULL,
    field       int(11) DEFAULT '0' NOT NULL,
    like_move   int(11) DEFAULT '0' NOT NULL,
    player      int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_chapted_domain_model_challenge'
#
CREATE TABLE tx_chapted_domain_model_challenge
(
    player        int(11) unsigned DEFAULT '0' NOT NULL,
    title         varchar(255) DEFAULT '' NOT NULL,
    description   text                    NOT NULL,
    reckoning     varchar(255) DEFAULT '' NOT NULL,
    likes         int(11) DEFAULT '0' NOT NULL,
    winning_point varchar(255) DEFAULT '' NOT NULL,
    qr_code       varchar(255) DEFAULT '' NOT NULL,
    latitude      varchar(255) DEFAULT '' NOT NULL,
    longitude     varchar(255) DEFAULT '' NOT NULL,
    moves         int(11) unsigned DEFAULT '0' NOT NULL,
    owner         int(11) unsigned DEFAULT '0' NOT NULL,
);

#
# Table structure for table 'tx_chapted_domain_model_table'
#
CREATE TABLE tx_chapted_domain_model_table
(
    month      datetime DEFAULT '0000-00-00 00:00:00',
    year       datetime DEFAULT '0000-00-00 00:00:00',
    challenges int(11) unsigned DEFAULT '0',
);