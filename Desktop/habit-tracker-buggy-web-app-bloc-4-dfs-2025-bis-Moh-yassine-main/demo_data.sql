-- =====================================================
-- Demo data for Habit Tracker 
-- Single demo user + several habits + habit_logs
-- =====================================================

USE habit_tracker;

-- Insert demo user (id fixe pour cohérence)
-- Note: password is plain text for demo only; in real app use password_hash()
INSERT INTO mns_user (id, firstname, lastname, email, password, isadmin, created_at)
VALUES (1000, 'Demo', 'User', 'demo@local.lab', 'demo1234', 0, NOW());

-- Habits for demo user
-- We set explicit ids so we can reference them easily in habit_logs
INSERT INTO habits (id, user_id, name, description, created_at) VALUES
(2001, 1000, 'Boire 2L d''eau', 'Boire deux litres d''eau par jour', DATE_SUB(CURDATE(), INTERVAL 14 DAY)),
(2002, 1000, 'Lire 20 minutes', 'Lire au moins 20 minutes par jour', DATE_SUB(CURDATE(), INTERVAL 10 DAY)),
(2003, 1000, 'Faire du sport', '30 minutes d''activité physique', DATE_SUB(CURDATE(), INTERVAL 20 DAY)),
(2004, 1000, 'Apprendre PHP', '30 minutes d''exercices PHP', DATE_SUB(CURDATE(), INTERVAL 7 DAY)),
(2005, 1000, 'Méditation', '10 minutes de méditation calme', DATE_SUB(CURDATE(), INTERVAL 5 DAY));

-- Habit logs (status = 1 means "fait")
-- We create logs on different dates for each habit to simulate activity.
-- Use CURDATE() and DATE_SUB so les données restent relatives à la date d'exécution.

-- Habit 2001: bonne régularité (11/14 derniers jours)
INSERT INTO habit_logs (habit_id, log_date, status, created_at) VALUES
(2001, DATE_SUB(CURDATE(), INTERVAL 13 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 12 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 11 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 9 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 7 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 6 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 5 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 3 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 2 DAY), 1, NOW()),
(2001, DATE_SUB(CURDATE(), INTERVAL 1 DAY), 1, NOW()),
(2001, CURDATE(), 1, NOW());

-- Habit 2002: lecture irrégulière (3/7 derniers jours)
INSERT INTO habit_logs (habit_id, log_date, status, created_at) VALUES
(2002, DATE_SUB(CURDATE(), INTERVAL 6 DAY), 1, NOW()),
(2002, DATE_SUB(CURDATE(), INTERVAL 4 DAY), 1, NOW()),
(2002, DATE_SUB(CURDATE(), INTERVAL 1 DAY), 1, NOW());

-- Habit 2003: sport intermittent (2/14 derniers jours)
INSERT INTO habit_logs (habit_id, log_date, status, created_at) VALUES
(2003, DATE_SUB(CURDATE(), INTERVAL 12 DAY), 1, NOW()),
(2003, DATE_SUB(CURDATE(), INTERVAL 2 DAY), 1, NOW());

-- Habit 2004: apprentissage récent (4/7 derniers jours)
INSERT INTO habit_logs (habit_id, log_date, status, created_at) VALUES
(2004, DATE_SUB(CURDATE(), INTERVAL 6 DAY), 1, NOW()),
(2004, DATE_SUB(CURDATE(), INTERVAL 4 DAY), 1, NOW()),
(2004, DATE_SUB(CURDATE(), INTERVAL 2 DAY), 1, NOW()),
(2004, CURDATE(), 1, NOW());

-- Habit 2005: méditation sporadique (1/7 derniers jours)
INSERT INTO habit_logs (habit_id, log_date, status, created_at) VALUES
(2005, DATE_SUB(CURDATE(), INTERVAL 3 DAY), 1, NOW());

-- =====================================================
-- End of demo data
-- =====================================================
