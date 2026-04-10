<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Arby Hair Design</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color: #f4f7f6;
            --surface-color: #ffffff;
            --text-primary: #333333;
            --text-secondary: #666666;
            --primary-color: #000000;
            --success-color: #2e7d32;
            --danger-color: #d32f2f;
            --border-color: #e0e0e0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-color);
            color: var(--text-primary);
            margin: 0;
            padding: 0;
        }

        header {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 600;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .section-title {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--text-primary);
            border-bottom: 2px solid var(--border-color);
            padding-bottom: 0.5rem;
        }

        .card {
            background-color: var(--surface-color);
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            padding: 1.5rem;
            margin-bottom: 2rem;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: left;
        }

        th, td {
            padding: 1rem;
            border-bottom: 1px solid var(--border-color);
        }

        th {
            background-color: #f9fafb;
            font-weight: 600;
            color: var(--text-secondary);
            text-transform: uppercase;
            font-size: 0.85rem;
            letter-spacing: 0.05em;
        }

        tr:hover {
            background-color: #f9fafb;
        }

        .status-badge {
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
        }

        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-confirmed { background-color: #d4edda; color: #155724; }
        .status-rejected { background-color: #f8d7da; color: #721c24; }

        .form-group {
            display: flex;
            gap: 0.5rem;
            align-items: center;
        }

        input[type="date"], input[type="time"] {
            padding: 0.5rem;
            border: 1px solid var(--border-color);
            border-radius: 4px;
            font-family: inherit;
        }

        .btn {
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 4px;
            font-weight: 500;
            cursor: pointer;
            transition: opacity 0.2s;
            font-size: 0.875rem;
        }

        .btn:hover {
            opacity: 0.9;
        }

        .btn-confirm { background-color: var(--success-color); color: white; }
        .btn-reject { background-color: var(--danger-color); color: white; }

        .alert {
            padding: 1rem;
            border-radius: 4px;
            margin-bottom: 1rem;
        }
        .alert-success { background-color: #d4edda; color: #155724; }
        .alert-error { background-color: #f8d7da; color: #721c24; }

        .action-cell form {
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
    <div><a href="index.php" style="color:white; text-decoration:none;">View Site</a></div>
</header>

<div class="container">
    <?php if (isset($_GET['status'])): ?>
        <?php if ($_GET['status'] == 'success'): ?>
            <div class="alert alert-success">Action executed successfully. An email has been sent if confirmed.</div>
        <?php elseif ($_GET['status'] == 'error'): ?>
            <div class="alert alert-error">An error occurred while executing the action.</div>
        <?php endif; ?>
    <?php endif; ?>

    <div class="card">
        <h2 class="section-title">Booking Requests</h2>
        <table>
            <thead>
                <tr>
                    <th>Date Submitted</th>
                    <th>Client Information</th>
                    <th>Service & Requests</th>
                    <th>Status</th>
                    <th>Assign Date/Time & Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($bookings)): ?>
                    <?php foreach ($bookings as $b): ?>
                        <tr>
                            <td><?= htmlspecialchars(date('M d, Y H:i', strtotime($b['created_at']))) ?></td>
                            <td>
                                <strong><?= htmlspecialchars($b['full_name']) ?></strong><br>
                                <small><?= htmlspecialchars($b['email']) ?></small><br>
                                <small><?= htmlspecialchars($b['phone']) ?></small>
                            </td>
                            <td>
                                <strong><?= htmlspecialchars($b['service_requested']) ?></strong><br>
                                <em>Pref: <?= htmlspecialchars($b['preferred_date']) ?></em><br>
                                <small><?= htmlspecialchars($b['special_requests'] ?? '') ?></small>
                            </td>
                            <td>
                                <?php $status = $b['status'] ?? 'pending'; ?>
                                <span class="status-badge status-<?= htmlspecialchars($status) ?>">
                                    <?= htmlspecialchars($status) ?>
                                </span>
                                <?php if ($status == 'confirmed'): ?>
                                    <br><small><?= htmlspecialchars($b['assigned_date'] . ' ' . $b['assigned_time']) ?></small>
                                <?php endif; ?>
                            </td>
                            <td class="action-cell">
                                <?php if ($status == 'pending'): ?>
                                <form method="POST" action="index.php?url=admin_action">
                                    <input type="hidden" name="id" value="<?= $b['id'] ?>">
                                    <div class="form-group">
                                        <input type="date" name="assigned_date" required>
                                        <input type="time" name="assigned_time" required>
                                    </div>
                                    <div class="action-buttons">
                                        <button type="submit" name="action" value="confirm" class="btn btn-confirm">Confirm</button>
                                        <button type="submit" name="action" value="reject" class="btn btn-reject" formnovalidate>Reject</button>
                                    </div>
                                </form>
                                <?php else: ?>
                                    <span style="color:var(--text-secondary); font-size:0.875rem;">Action Completed</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No booking requests found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <div class="card">
        <h2 class="section-title">Education Reservations & Inscriptions</h2>
        <table>
            <thead>
                <tr>
                    <th>Date Received</th>
                    <th>Client / Subscriber</th>
                    <th>Education Requested</th>
                    <th>Status</th>
                    <th>Assign Date/Time & Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($subscribers)): ?>
                    <?php foreach ($subscribers as $s): ?>
                        <tr>
                            <td><?= htmlspecialchars(date('M d, Y H:i', strtotime($s['subscribed_at']))) ?></td>
                            <td>
                                <?php if (!empty($s['full_name'])): ?>
                                    <strong><?= htmlspecialchars($s['full_name']) ?></strong><br>
                                    <small><?= htmlspecialchars($s['email']) ?></small><br>
                                    <small><?= htmlspecialchars($s['phone']) ?></small>
                                <?php else: ?>
                                    <strong>Newsletter Only</strong><br>
                                    <small><?= htmlspecialchars($s['email']) ?></small>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($s['service_requested'])): ?>
                                    <strong><?= htmlspecialchars($s['service_requested']) ?></strong><br>
                                    <em>Pref: <?= htmlspecialchars($s['preferred_date']) ?></em><br>
                                    <small><?= htmlspecialchars($s['special_requests'] ?? '') ?></small>
                                <?php else: ?>
                                    <em>None / Subscription</em>
                                <?php endif; ?>
                            </td>
                            <td>
                                <?php if (!empty($s['full_name'])): ?>
                                    <?php $status = $s['status'] ?? 'pending'; ?>
                                    <span class="status-badge status-<?= htmlspecialchars($status) ?>">
                                        <?= htmlspecialchars($status) ?>
                                    </span>
                                    <?php if ($status == 'confirmed'): ?>
                                        <br><small><?= htmlspecialchars($s['assigned_date'] . ' ' . $s['assigned_time']) ?></small>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span style="color:var(--text-secondary); font-size:0.875rem;">N/A</span>
                                <?php endif; ?>
                            </td>
                            <td class="action-cell">
                                <?php if (!empty($s['full_name'])): ?>
                                    <?php if ($status == 'pending'): ?>
                                    <form method="POST" action="index.php?url=admin_education_action">
                                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                                        <div class="form-group">
                                            <input type="date" name="assigned_date" required>
                                            <input type="time" name="assigned_time" required>
                                        </div>
                                        <div class="action-buttons">
                                            <button type="submit" name="action" value="confirm" class="btn btn-confirm">Confirm</button>
                                            <button type="submit" name="action" value="reject" class="btn btn-reject" formnovalidate>Reject</button>
                                        </div>
                                    </form>
                                    <?php else: ?>
                                        <span style="color:var(--text-secondary); font-size:0.875rem;">Action Completed</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span style="color:var(--text-secondary); font-size:0.875rem;">Newsletter Action N/A</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5" style="text-align: center;">No education inscriptions found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

</body>
</html>
