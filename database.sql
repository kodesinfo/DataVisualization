/* make Database Data */
CREATE DATABASE `data`


/* make API List Table */
CREATE TABLE `api` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `coid` varchar(10) NOT NULL,
  `id` varchar(100) NOT NULL,
  `title` varchar(256) NOT NULL,
  `provider` varchar(100) DEFAULT NULL,
  `returnType` varchar(100) DEFAULT NULL,
  `apiKey` varchar(100) DEFAULT NULL,
  `url` varchar(1000) DEFAULT NULL,
  `dateChar` varchar(100) DEFAULT NULL,
  `listTag` varchar(100) DEFAULT NULL,
  `workWeek` varchar(100) DEFAULT NULL,
  `startTime` varchar(100) DEFAULT NULL,
  `endTime` varchar(100) DEFAULT NULL,
  `everyFewMinutes` smallint(6) DEFAULT NULL,
  `database` varchar(100) DEFAULT NULL,
  `table` varchar(100) DEFAULT NULL,
  `updater` varchar(100) DEFAULT NULL,
  `updateDate` varchar(100) DEFAULT NULL,
  `lastItemUpdate` varchar(100) DEFAULT NULL,
  `creater` varchar(100) DEFAULT NULL,
  `createDate` varchar(100) DEFAULT NULL,
  `dataTerm` varchar(100) DEFAULT NULL,
  `grpId` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`idx`,`coid`),
  UNIQUE KEY `api_idx_IDX` (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8 COMMENT='api 세팅 테이블'


/* make API Field Table */
CREATE TABLE `apiField` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `apiIdx` int(11) NOT NULL,
  `tag` varchar(100) DEFAULT NULL COMMENT 'api 데이터 필드명',
  `field` varchar(100) DEFAULT NULL COMMENT '매칭될 field명',
  `defaultValue` varchar(100) DEFAULT NULL COMMENT '기본값 세팅시',
  `remark` varchar(100) DEFAULT NULL COMMENT '필드 설명문',
  `keyField` tinyint(1) DEFAULT 0 COMMENT '키필드 여부',
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=720 DEFAULT CHARSET=utf8 COMMENT='API 필드 테이블'

/* make API Group Table */
CREATE TABLE `apiGroup` (
  `idx` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `groupTitle` varchar(100) DEFAULT NULL,
  `sort` int(10) unsigned NOT NULL DEFAULT 99999,
  `maker` varchar(100) DEFAULT NULL,
  `makeDate` varchar(100) DEFAULT NULL,
  `modifer` varchar(100) DEFAULT NULL,
  `modifyDate` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COMMENT='API Group 테이블'


/* make API Group Table */
CREATE TABLE `makedChart` (
  `idx` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(1000) NOT NULL,
  `field1` varchar(1000) DEFAULT NULL,
  `field2` varchar(1000) DEFAULT NULL,
  `startDate` varchar(100) DEFAULT NULL,
  `endDate` varchar(100) DEFAULT NULL,
  `axisX` mediumtext DEFAULT NULL,
  `axisY` mediumtext DEFAULT NULL,
  `fieldTitle` text DEFAULT NULL,
  `type` text DEFAULT NULL,
  `color` text DEFAULT NULL,
  `makeDate` varchar(20) DEFAULT NULL,
  `makeId` varchar(100) DEFAULT NULL,
  `makeName` varchar(100) DEFAULT NULL,
  `makeIP` varchar(100) DEFAULT NULL,
  `unitTitle` varchar(100) DEFAULT NULL,
  `source` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idx`)
) ENGINE=InnoDB AUTO_INCREMENT=270 DEFAULT CHARSET=utf8 COMMENT='만들어진 Chart 정보 테이블'