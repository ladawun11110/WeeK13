-- SQL script to create the 'blogs' table matching the Laravel migration

CREATE TABLE IF NOT EXISTS `blogs` (
  `id` BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `title` VARCHAR(255) NOT NULL,
  `content` TEXT NOT NULL,
  `status` TINYINT(1) NOT NULL DEFAULT 1 COMMENT '0 = Draft, 1 = Published',
  `created_at` TIMESTAMP NULL DEFAULT NULL,
  `updated_at` TIMESTAMP NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Optional: Insert some initial dummy data
INSERT INTO `blogs` (`title`, `content`, `status`, `created_at`, `updated_at`) VALUES
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW()),
('เริ่มต้นการเขียนบล็อกด้วย Laravel', 'นี่คือเนื้อหาสำหรับเริ่มต้นเขียนบล็อกเบื้องต้นด้วย Laravel Framework...', 1, NOW(), NOW()),
('แนะแนวการใช้งาน Tailwind CSS', 'บทความสอนการปรับแต่งสไตล์เว็บไซต์ให้สวยงามและเป็นระเบียบด้วย Tailwind CSS...', 0, NOW(), NOW());
