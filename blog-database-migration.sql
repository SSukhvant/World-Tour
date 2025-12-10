-- Blog Table Migration Script
-- This script standardizes the blog status column to use 'Published' and 'Draft'

-- 1. Add or modify the status column to have a default of 'Draft'
ALTER TABLE `blog` 
  MODIFY COLUMN `status` VARCHAR(50) DEFAULT 'Draft' NOT NULL;

-- 2. Update any NULL or 'active' values to 'Published'
UPDATE `blog` SET `status` = 'Published' WHERE `status` IS NULL OR `status` = '' OR `status` = 'active' OR `status` = 'Active';

-- 3. Update any other invalid statuses to 'Draft' (optional, if there are typos or old values)
UPDATE `blog` SET `status` = 'Draft' WHERE `status` NOT IN ('Published', 'Draft');

-- Verify the changes:
SELECT COUNT(*) as total_blogs, status, COUNT(*) as count FROM `blog` GROUP BY `status`;
