-- Additive migration for the improved admin dashboard.
ALTER TABLE job_applications
    ADD COLUMN IF NOT EXISTS status VARCHAR(30) NOT NULL DEFAULT 'New' AFTER cv_filename,
    ADD INDEX IF NOT EXISTS idx_job_applications_status (status),
    ADD INDEX IF NOT EXISTS idx_job_applications_created_at (created_at),
    ADD INDEX IF NOT EXISTS idx_job_applications_category (category);

ALTER TABLE job_vacancies
    ADD COLUMN IF NOT EXISTS status VARCHAR(30) NOT NULL DEFAULT 'New' AFTER jd_filename,
    ADD INDEX IF NOT EXISTS idx_job_vacancies_status (status),
    ADD INDEX IF NOT EXISTS idx_job_vacancies_created_at (created_at);
