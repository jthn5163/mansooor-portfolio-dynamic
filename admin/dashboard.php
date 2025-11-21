<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Admin Dashboard</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
  <style>
    :root {
      --primary: #6366f1;
      --primary-dark: #4f46e5;
      --secondary: #8b5cf6;
      --success: #10b981;
      --warning: #f59e0b;
      --danger: #ef4444;
      --dark: #0f172a;
      --darker: #020617;
      --card-bg: #1e293b;
      --border: #334155;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      min-height: 100vh;
      background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      color: #e2e8f0;
    }

    .navbar {
      background: rgba(15, 23, 42, 0.95) !important;
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border);
      padding: 1rem 0;
    }

    .navbar-brand {
      font-weight: 700;
      font-size: 1.5rem;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .management-card {
      background: var(--card-bg);
      border-radius: 16px;
      padding: 0;
      border: 1px solid var(--border);
      overflow: hidden;
      transition: all 0.3s ease;
      height: 100%;
      cursor: pointer;
    }

    .management-card:hover {
      transform: translateY(-5px);
      border-color: var(--primary);
      box-shadow: 0 15px 40px rgba(99, 102, 241, 0.25);
    }

    .card-header-custom {
      padding: 2rem;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      position: relative;
      overflow: hidden;
    }

    .card-header-custom::before {
      content: '';
      position: absolute;
      top: -50%;
      right: -50%;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
      animation: pulse 3s ease-in-out infinite;
    }

    @keyframes pulse {

      0%,
      100% {
        transform: scale(1);
        opacity: 0.5;
      }

      50% {
        transform: scale(1.1);
        opacity: 0.8;
      }
    }

    .card-icon {
      font-size: 3rem;
      margin-bottom: 1rem;
      position: relative;
      z-index: 1;
    }

    .card-title-custom {
      font-size: 1.5rem;
      font-weight: 700;
      margin: 0;
      position: relative;
      z-index: 1;
    }

    .card-body-custom {
      padding: 1.5rem 2rem;
    }

    .card-description {
      color: #94a3b8;
      margin-bottom: 1.5rem;
      line-height: 1.6;
    }

    .card-action {
      display: inline-flex;
      align-items: center;
      color: var(--primary);
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .management-card:hover .card-action {
      color: #fff;
      transform: translateX(5px);
    }

    .card-action i {
      margin-left: 0.5rem;
      transition: transform 0.3s ease;
    }

    .management-card:hover .card-action i {
      transform: translateX(5px);
    }

    .modal-fullpage .modal-dialog {
      margin: 0;
      max-width: 100%;
      height: 100vh;
    }

    .modal-fullpage .modal-content {
      height: 100%;
      border: none;
      border-radius: 0;
      background: linear-gradient(135deg, var(--darker) 0%, var(--dark) 100%);
    }

    .modal-fullpage .modal-header {
      background: var(--card-bg);
      border-bottom: 1px solid var(--border);
      padding: 1.5rem 2rem;
    }

    .modal-fullpage .modal-title {
      font-size: 1.75rem;
      font-weight: 700;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .modal-fullpage .btn-close {
      filter: invert(1);
    }

    .modal-fullpage .modal-body {
      padding: 2rem;
      overflow-y: auto;
    }

    .form-label {
      color: #e2e8f0;
      font-weight: 600;
      margin-bottom: 0.5rem;
    }

    .form-control,
    .form-select {
      background: var(--card-bg);
      border: 1px solid var(--border);
      color: #e2e8f0;
      padding: 0.75rem 1rem;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .form-control:focus,
    .form-select:focus {
      background: var(--card-bg);
      border-color: var(--primary);
      color: #e2e8f0;
      box-shadow: 0 0 0 0.25rem rgba(99, 102, 241, 0.25);
    }

    .form-control::placeholder {
      color: #64748b;
    }

    textarea.form-control {
      min-height: 120px;
    }

    .btn-primary {
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      border: none;
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 25px rgba(99, 102, 241, 0.4);
    }

    .btn-secondary {
      background: var(--card-bg);
      border: 1px solid var(--border);
      color: #e2e8f0;
      padding: 0.75rem 2rem;
      font-weight: 600;
      border-radius: 8px;
      transition: all 0.3s ease;
    }

    .btn-secondary:hover {
      background: var(--border);
      border-color: var(--border);
      color: #fff;
    }

    .btn-success {
      background: var(--success);
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
    }

    .btn-danger {
      background: var(--danger);
      border: none;
      padding: 0.5rem 1rem;
      border-radius: 6px;
    }

    .table-container {
      background: var(--card-bg);
      border-radius: 12px;
      padding: 1.5rem;
      border: 1px solid var(--border);
      margin-top: 2rem;
    }

    .table {
      color: #e2e8f0;
      margin-bottom: 0;
    }

    .table thead th {
      background: rgba(99, 102, 241, 0.1);
      border-bottom: 2px solid var(--primary);
      color: var(--primary);
      font-weight: 700;
      text-transform: uppercase;
      font-size: 0.875rem;
      letter-spacing: 0.05em;
      padding: 1rem;
    }

    .table tbody tr {
      border-bottom: 1px solid var(--border);
      transition: all 0.3s ease;
    }

    .table tbody tr:hover {
      background: rgba(99, 102, 241, 0.05);
    }

    .table tbody td {
      padding: 1rem;
      vertical-align: middle;
    }

    .table-actions {
      display: flex;
      gap: 0.5rem;
    }

    .action-btn {
      padding: 0.375rem 0.75rem;
      border-radius: 6px;
      border: none;
      font-size: 0.875rem;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .action-btn:hover {
      transform: translateY(-2px);
    }

    .section-header-modal {
      margin-bottom: 2rem;
    }

    .section-title-modal {
      font-size: 1.5rem;
      font-weight: 700;
      color: #e2e8f0;
      margin-bottom: 0.5rem;
    }

    .section-subtitle-modal {
      color: #94a3b8;
    }

    .image-preview {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      border: 2px solid var(--border);
    }

    .status-badge {
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.875rem;
      font-weight: 600;
    }

    .status-active {
      background: rgba(16, 185, 129, 0.2);
      color: var(--success);
    }

    .status-inactive {
      background: rgba(148, 163, 184, 0.2);
      color: #94a3b8;
    }

    @media (max-width: 768px) {
      .modal-fullpage .modal-body {
        padding: 1rem;
      }

      .table-responsive {
        font-size: 0.875rem;
      }

      .action-btn {
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
      }
    }
  </style>


  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container-fluid px-4">
      <a class="navbar-brand" href="#">
        <i class="fas fa-crown me-2"></i>Admin Dashboard
      </a>
    </div>
  </nav>

  <div class="container-fluid px-4 py-5">
    <div class="row g-4">
      <div class="col-12 col-sm-6 col-lg-3">
        <div class="management-card" data-bs-toggle="modal" data-bs-target="#bannerModal">
          <div class="card-header-custom text-white text-center">
            <div class="card-icon">
              <i class="fas fa-image"></i>
            </div>
            <h3 class="card-title-custom">Banner</h3>
          </div>
          <div class="card-body-custom">
            <p class="card-description">Manage hero sections, main visuals, and featured content displays</p>
            <div class="card-action">
              Manage <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="management-card" data-bs-toggle="modal" data-bs-target="#aboutModal">
          <div class="card-header-custom text-white text-center">
            <div class="card-icon">
              <i class="fas fa-user-circle"></i>
            </div>
            <h3 class="card-title-custom">About</h3>
          </div>
          <div class="card-body-custom">
            <p class="card-description">Update biography, personal information, and profile details</p>
            <div class="card-action">
              Manage <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="management-card" data-bs-toggle="modal" data-bs-target="#experienceModal">
          <div class="card-header-custom text-white text-center">
            <div class="card-icon">
              <i class="fas fa-briefcase"></i>
            </div>
            <h3 class="card-title-custom">Experience</h3>
          </div>
          <div class="card-body-custom">
            <p class="card-description">Add and edit work history, skills, and professional achievements</p>
            <div class="card-action">
              Manage <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-6 col-lg-3">
        <div class="management-card" data-bs-toggle="modal" data-bs-target="#filmographyModal">
          <div class="card-header-custom text-white text-center">
            <div class="card-icon">
              <i class="fas fa-video"></i>
            </div>
            <h3 class="card-title-custom">Filmography</h3>
          </div>
          <div class="card-body-custom">
            <p class="card-description">Manage your portfolio of films, projects, and media content</p>
            <div class="card-action">
              Manage <i class="fas fa-arrow-right"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Banner Modal -->
  <div class="modal fade modal-fullpage" id="bannerModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-image me-2"></i>Banner Management</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="section-header-modal">
            <h6 class="section-title-modal">Add New Banner</h6>
            <p class="section-subtitle-modal">Upload and configure banner images for your website</p>
          </div>

          <form id="bannerForm">
            <input type="hidden" name="id" id="bannerEditId">
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Banner Title</label>
                <input type="text" class="form-control" name="banner_name" id="banner_name" placeholder="Enter banner title" required>
              </div>
              <div class="col-md-12">
                <label class="form-label">Banner Image</label>
                <input type="file" class="form-control" name="banner_img" id="banner_img" accept="image/*">
                <img id="banner-preview" src="#" style="display:none;max-width:120px;margin-top:10px;border-radius:8px;">
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-2">
                  <i class="fas fa-save me-2"></i>Save Banner
                </button>
                <button type="reset" class="btn btn-secondary">
                  <i class="fas fa-redo me-2"></i>Reset
                </button>
              </div>
            </div>
          </form>

          <div class="table-container">
            <h6 class="section-title-modal mb-3">Existing Banners</h6>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><img src="https://via.placeholder.com/100" class="image-preview" alt="Banner"></td>
                    <td>Welcome Banner</td>
                    <td><span class="status-badge status-active">Active</span></td>
                    <td>1</td>
                    <td>
                      <div class="table-actions">
                        <button class="action-btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td><img src="https://via.placeholder.com/100" class="image-preview" alt="Banner"></td>
                    <td>Promotional Banner</td>
                    <td><span class="status-badge status-inactive">Inactive</span></td>
                    <td>2</td>
                    <td>
                      <div class="table-actions">
                        <button class="action-btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- banner js -->
  <script>
    $(function() {
      const $bannerForm = $('#bannerForm');
      const $bannerEditId = $('#bannerEditId');
      const $bannerTableBody = $('#bannerModal .table tbody');
      const $bannerImgInput = $('#banner_img');
      const $bannerPreview = $('#banner-preview');
      const $bannerNameInput = $('#banner_name');

      // Preview banner image
      $bannerImgInput.on('change', function(e) {
        const file = this.files[0];
        if (file) {
          $bannerPreview.attr('src', URL.createObjectURL(file)).show();
        } else {
          $bannerPreview.attr('src', "#").hide();
        }
      });

      // Load banners (AJAX to PHP)
      function loadBannerTable() {
        $.ajax({
          url: 'backend/banner_list.php',
          type: 'GET',
          dataType: 'json',
          success: function(res) {

            console.log(res);
            debugger;

            $bannerTableBody.empty();
            res.rows.forEach(function(row, idx) {
              let imgSrc = row.banner_img ? ' backend/' + row.banner_img : '';
              $bannerTableBody.append(`
            <tr data-id="${row.id}">
              <td>${imgSrc ? `<img src="${imgSrc}" class="image-preview" style="width:100px;">` : ''}</td>
              <td>${row.banner_name || ""}</td>
              <td>
                <div class="table-actions">
                  <button class="action-btn btn-success edit-banner-btn"><i class="fas fa-edit"></i> Edit</button>
                  <button class="action-btn btn-danger delete-banner-btn"><i class="fas fa-trash"></i> Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
          }
        });
      }
      loadBannerTable();

      // Save NEW or UPDATE
      $bannerForm.on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const isEditing = $bannerEditId.val() ? true : false;
        $.ajax({
          url: isEditing ? 'backend/banner_update.php' : 'backend/banner_save.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function(result) {
            if (result.status === 'success') {
              loadBannerTable();
              $bannerForm[0].reset();
              $bannerPreview.hide();
              $bannerEditId.val('');
            } else {
              alert('Error: ' + (result.msg || 'Unknown error'));
            }
          },
          error: function(xhr) {
            alert('Network error');
          }
        });
      });

      // Edit handler
      $bannerTableBody.on('click', '.edit-banner-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        $bannerEditId.val(id);
        $bannerNameInput.val($tr.find('td:eq(1)').text());
        let imgSrc = $tr.find('td:eq(0) img').attr('src');
        if (imgSrc) {
          $bannerPreview.attr('src', imgSrc).show();
        } else {
          $bannerPreview.attr('src', "#").hide();
        }
      });

      // Delete handler
      $bannerTableBody.on('click', '.delete-banner-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        if (confirm('Are you sure to delete this banner?')) {
          $.ajax({
            url: 'backend/banner_delete.php',
            type: 'POST',
            data: {
              id: id
            },
            dataType: 'json',
            success: function(res) {
              if (res.status === 'success') {
                $tr.remove();
              } else {
                alert('Error deleting banner');
              }
            }
          });
        }
      });
    });
  </script>
  <!-- banner js -->

  <!-- About Modal -->
  <div class="modal fade modal-fullpage" id="aboutModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">
            <i class="fas fa-user-circle me-2"></i>About Management
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="section-header-modal">
            <h6 class="section-title-modal">Edit About Information</h6>
            <p class="section-subtitle-modal">Update your biography and personal details</p>
          </div>

          <!-- MODAL FORM -->
          <form id="aboutForm">
            <div class="row g-3">
              <!-- Positions -->
              <div class="col-md-12">
                <label class="form-label">Position(s) <span class="text-muted">(Add up to 3)</span></label>
                <div id="positions-container">
                  <input type="text" class="form-control mb-2" name="position[]" placeholder="e.g., Assistant Director" required>
                </div>
                <button type="button" class="btn btn-link p-0" id="add-position-btn">+ Add Another Position</button>
              </div>
              <!-- About -->
              <div class="col-md-12">
                <label class="form-label">About</label>
                <textarea class="form-control" rows="6" name="about" placeholder="Write your biography here..." required></textarea>
              </div>
              <!-- Profile Image -->
              <div class="col-md-12">
                <label class="form-label">Profile Image</label>
                <input type="file" class="form-control" name="profileImage" id="profileImage" accept="image/*">
                <img id="profile-preview" src="#" alt="Profile Preview" style="display:none;max-width:120px;margin-top:10px;border-radius:8px;box-shadow:0 0 10px #ffd700;" />
              </div>
              <!-- Number of Films -->
              <div class="col-md-6">
                <label class="form-label">Number of Films</label>
                <input type="number" class="form-control" name="films" min="1" placeholder="e.g., 15+" required>
              </div>
              <!-- Years of Experience -->
              <div class="col-md-6">
                <label class="form-label">Years of Experience</label>
                <input type="number" class="form-control" name="experience" min="1" placeholder="e.g., 8" required>
              </div>
              <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary me-2">
                  <i class="fas fa-save me-2"></i>Update Profile
                </button>
                <button type="reset" class="btn btn-secondary">
                  <i class="fas fa-redo me-2"></i>Reset
                </button>
              </div>
            </div>
          </form>

          <!-- TABLE BELOW FORM -->
          <div class="table-container mt-4">
            <h6 class="section-title-modal mb-3">Profile Information</h6>
            <div class="table-responsive">
              <table class="table table-bordered" id="aboutTable">
                <thead>
                  <tr>
                    <th>Profile Image</th>
                    <th>Position(s)</th>
                    <th>About</th>
                    <th>Films</th>
                    <th>Experience</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Rows populated by JS -->
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- about js -->
  <script>
    $(function() {
      const maxPositions = 3;
      const $positionsContainer = $('#positions-container');
      const $addPositionBtn = $('#add-position-btn');
      const $aboutForm = $('#aboutForm');
      const $profileImage = $('#profileImage');
      const $profilePreview = $('#profile-preview');
      const $aboutTableBody = $('#aboutTable tbody');
      const $editId = $('#editId');

      // Add positions
      $addPositionBtn.on('click', function() {
        const currentFields = $positionsContainer.find('input[name="position[]"]');
        if (currentFields.length < maxPositions) {
          $positionsContainer.append(
            `<input type="text" class="form-control mb-2" name="position[]" placeholder="e.g., Cinematic Visionary" required>`
          );
        }
        if ($positionsContainer.find('input[name="position[]"]').length >= maxPositions) {
          $addPositionBtn.prop('disabled', true);
        }
      });

      // Preview profile image
      $profileImage.on('change', function(e) {
        const file = this.files[0];
        if (file) {
          $profilePreview.attr('src', URL.createObjectURL(file)).show();
        } else {
          $profilePreview.attr('src', "#").hide();
        }
      });

      // Load About Table from DB
      function loadAboutTable() {
        $.ajax({
          url: 'backend/about_list.php',
          type: 'GET',
          dataType: 'json',
          success: function(res) {

            console.log(res);
            // debugger;

            $aboutTableBody.empty();
            res.rows.forEach(function(row) {
              let imgSrc = row.profile_image ? 'backend/' + row.profile_image : '';
              let positions = Array.isArray(row.positions) ? row.positions : [];
              $aboutTableBody.append(`
            <tr data-id="${row.id}">
              <td>${imgSrc ? `<img src="${imgSrc}" style="width:60px;border-radius:8px;">` : ''}</td>
              <td>${positions.map(pos => `<span class="badge bg-dark me-1">${pos}</span>`).join(' ')}</td>
              <td>${row.description || ""}</td>
              <td>${row.films || ""}</td>
              <td>${row.experience || ""}</td>
              <td>
                <button class="btn btn-sm btn-success me-2 edit-btn">Edit</button>
                <button class="btn btn-sm btn-danger delete-btn">Delete</button>
              </td>
            </tr>
          `);
            });
          },
          error: function(xhr, status, error) {
            alert('Could not load profile data: ' + error);
          }
        });
      }

      loadAboutTable();

      // Save/Update form with AJAX
      $aboutForm.on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        const isEditing = $editId.val() ? true : false;
        $.ajax({
          url: isEditing ? 'backend/about_update.php' : 'backend/about_save.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function(result) {
            if (result.status === 'success') {
              loadAboutTable();
              $aboutForm[0].reset();
              $profilePreview.hide();
              $editId.val('');
              $addPositionBtn.prop('disabled', false);
              $positionsContainer.find('input:not(:first)').remove();
              alert(isEditing ? 'Profile updated!' : 'Profile saved!');
            } else {
              alert('Error: ' + (result.msg || 'Unknown error'));
            }
          },
          error: function(xhr, status, error) {
            alert('Network error: ' + error);
          }
        });
      });

      // Delete row handler
      $aboutTableBody.on('click', '.delete-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        if (confirm('Are you sure to delete this entry?')) {
          $.ajax({
            url: 'backend/about_delete.php',
            type: 'POST',
            data: {
              id: id
            },
            dataType: 'json',
            success: function(res) {
              if (res.status === 'success') {
                $tr.remove();
                alert('Deleted!');
              } else {
                alert('Error deleting: ' + (res.msg || 'Unknown error'));
              }
            },
            error: function(xhr, status, error) {
              alert('Network error: ' + error);
            }
          });
        }
      });

      // Edit row handler: populate form
      $aboutTableBody.on('click', '.edit-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        let positions = [];
        $tr.find('td:eq(1) .badge').each(function() {
          positions.push($(this).text());
        });

        // Clear and fill position inputs
        $positionsContainer.find('input').remove();
        for (let i = 0; i < maxPositions && i < positions.length; i++) {
          $positionsContainer.append(
            `<input type="text" class="form-control mb-2" name="position[]" placeholder="e.g., Cinematic Visionary" required value="${positions[i]}">`
          );
        }
        // Always at least one input
        if (positions.length === 0) {
          $positionsContainer.append(`<input type="text" class="form-control mb-2" name="position[]" required>`);
        }
        $addPositionBtn.prop('disabled', ($positionsContainer.find('input[name="position[]"]').length >= maxPositions));

        $aboutForm.find('[name="about"]').val($tr.find('td:eq(2)').text());
        $aboutForm.find('[name="films"]').val($tr.find('td:eq(3)').text());
        $aboutForm.find('[name="experience"]').val($tr.find('td:eq(4)').text());
        $editId.val(id);

        // Set image preview if available
        let imgSrc = $tr.find('td:eq(0) img').attr('src');
        if (imgSrc) {
          $profilePreview.attr('src', imgSrc).show();
        } else {
          $profilePreview.attr('src', "#").hide();
        }

        // Show modal (if using modal)
        $('#aboutModal').modal('show');
      });
    });
  </script>
  <!-- about js -->

  <!-- Experience Modal for Film Director -->
  <div class="modal fade modal-fullpage" id="experienceModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-film me-2"></i>Project / Film Experience</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="section-header-modal">
            <h6 class="section-title-modal">Add Film Project / Experience</h6>
            <p class="section-subtitle-modal">Document your journey, filmography, and achievements as a director</p>
          </div>

          <form id="experienceForm">
            <input type="hidden" name="id" id="experienceEditId">
            <div class="row g-3">

              <div class="col-md-8">
                <label class="form-label">Film / Project Title</label>
                <input type="text" class="form-control" name="title" placeholder="e.g., Shadows of Chennai" required>
              </div>

              <div class="col-md-4">
                <label class="form-label">Year</label>
                <input type="text" class="form-control" name="year" placeholder="e.g., 2024" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="role" placeholder="e.g., Director, Co-Director" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Production House / Studio</label>
                <input type="text" class="form-control" name="production" placeholder="e.g., Dream Pictures">
              </div>

              <div class="col-md-6">
                <label class="form-label">Type</label>
                <select class="form-select" name="type" required>
                  <option>Feature Film</option>
                  <option>Short Film</option>
                  <option>Web Series</option>
                  <option>Ad Film</option>
                  <option>Music Video</option>
                  <option>Other</option>
                </select>
              </div>

              <!-- <div class="col-md-6">
                <label class="form-label">Festival / OTT / TV Release</label>
                <input type="text" class="form-control" name="release" placeholder="e.g., Cannes 2023, Netflix, Sun TV, etc.">
              </div> -->

              <div class="col-md-12">
                <label class="form-label">Project Poster / Still Image</label>
                <input type="file" class="form-control" name="project_img" id="project_img" accept="image/*">
                <img id="project-img-preview" src="#" style="display:none;max-width:140px;margin-top:10px;border-radius:12px;">
              </div>


              <div class="col-md-12">
                <label class="form-label">Project Description</label>
                <textarea class="form-control" name="description" rows="3" placeholder="Describe genre, themes, or your vision..."></textarea>
              </div>

              <!-- <div class="col-md-12">
                <label class="form-label">Awards / Recognitions</label>
                <textarea class="form-control" name="awards" rows="2" placeholder="Best Director, Audience Choice, etc."></textarea>
              </div> -->

              <div class="col-12">
                <button type="submit" class="btn btn-primary me-2">
                  <i class="fas fa-plus me-2"></i>Add Experience
                </button>
                <button type="reset" class="btn btn-secondary">
                  <i class="fas fa-redo me-2"></i>Reset
                </button>
              </div>
            </div>
          </form>

          <div class="table-container mt-4">
            <h6 class="section-title-modal mb-3">Filmography / Project Experience</h6>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Role</th>
                    <th>Studio</th>
                    <th>Type</th>
                    <th>Release/Festival</th>
                    <th>Awards</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- JS will render entries dynamically here -->
                  <tr>
                    <td>Shadows of Chennai</td>
                    <td>2024</td>
                    <td>Director</td>
                    <td>Dream Pictures</td>
                    <td>Feature Film</td>
                    <td>Cannes 2024</td>
                    <td>Best Newcomer</td>
                    <td>
                      <div class="table-actions">
                        <button class="action-btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Promo for Future Stars</td>
                    <td>2023</td>
                    <td>Assistant Director</td>
                    <td>Alpha Studios</td>
                    <td>Ad Film</td>
                    <td>Viral – TV+YouTube</td>
                    <td>–</td>
                    <td>
                      <div class="table-actions">
                        <button class="action-btn btn-success"><i class="fas fa-edit"></i> Edit</button>
                        <button class="action-btn btn-danger"><i class="fas fa-trash"></i> Delete</button>
                      </div>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

  <!-- experience js -->
  <script>
    $(function() {
      // jQuery selectors for form and table
      const $experienceForm = $('#experienceForm');
      const $experienceEditId = $('#experienceEditId');
      const $experienceTableBody = $('#experienceModal .table tbody');
      const $projectImgInput = $('#project_img');
      const $projectImgPreview = $('#project-img-preview');

      // Preview uploaded image
      $projectImgInput.on('change', function() {
        const file = this.files[0];
        if (file) {
          $projectImgPreview.attr('src', URL.createObjectURL(file)).show();
        } else {
          $projectImgPreview.attr('src', "#").hide();
        }
      });

      // Load all experience entries from DB
      function loadExperienceTable() {
        $.ajax({
          url: 'backend/experience_list.php', // Your PHP endpoint
          type: 'GET',
          dataType: 'json',
          success: function(res) {
            $experienceTableBody.empty();
            res.rows.forEach(function(row) {
              let imgCell = row.project_img ? `<img src="/backend/${row.project_img}" style="width:60px;border-radius:10px;">` : '';
              $experienceTableBody.append(`
            <tr data-id="${row.id}">
              <td>${imgCell + ' ' + (row.title || "")}</td>
              <td>${row.year || ""}</td>
              <td>${row.role || ""}</td>
              <td>${row.production || ""}</td>
              <td>${row.type || ""}</td>
              <td>${row.release || ""}</td>
              <td>${row.awards || ""}</td>
              <td>
                <div class="table-actions">
                  <button class="action-btn btn-success edit-experience-btn"><i class="fas fa-edit"></i> Edit</button>
                  <button class="action-btn btn-danger delete-experience-btn"><i class="fas fa-trash"></i> Delete</button>
                </div>
              </td>
            </tr>
          `);
            });
          }
        });
      }
      loadExperienceTable();

      // Add or Update Experience AJAX
      $experienceForm.on('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        console.log(...formData.entries());
        debugger;

        const isEditing = $experienceEditId.val() ? true : false;
        $.ajax({
          url: isEditing ? 'backend/experience_update.php' : 'backend/experience_save.php',
          type: 'POST',
          data: formData,
          processData: false,
          contentType: false,
          dataType: 'json',
          success: function(result) {
            if (result.status === 'success') {
              loadExperienceTable();
              $experienceForm[0].reset();
              $experienceEditId.val('');
              $projectImgPreview.hide();
            } else {
              alert('Error: ' + (result.msg || 'Unknown error'));
            }
          },
          error: function(xhr) {
            alert('Network error');
          }
        });
      });

      // Edit handler
      $experienceTableBody.on('click', '.edit-experience-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        $experienceEditId.val(id);

        // Fill form fields
        $experienceForm.find('[name="title"]').val($tr.find('td:eq(0)').text().trim());
        $experienceForm.find('[name="year"]').val($tr.find('td:eq(1)').text().trim());
        $experienceForm.find('[name="role"]').val($tr.find('td:eq(2)').text().trim());
        $experienceForm.find('[name="production"]').val($tr.find('td:eq(3)').text().trim());
        $experienceForm.find('[name="type"]').val($tr.find('td:eq(4)').text().trim());
        $experienceForm.find('[name="release"]').val($tr.find('td:eq(5)').text().trim());
        $experienceForm.find('[name="awards"]').val($tr.find('td:eq(6)').text().trim());

        // If there's an image (first cell's img)
        let imgSrc = $tr.find('td:eq(0) img').attr('src');
        if (imgSrc) {
          $projectImgPreview.attr('src', imgSrc).show();
        } else {
          $projectImgPreview.attr('src', "#").hide();
        }
        // Optionally fill description too if included!
        // $experienceForm.find('[name="description"]').val(...);
      });

      // Delete handler
      $experienceTableBody.on('click', '.delete-experience-btn', function() {
        const $tr = $(this).closest('tr');
        const id = $tr.data('id');
        if (confirm('Are you sure to delete this experience entry?')) {
          $.ajax({
            url: 'backend/experience_delete.php',
            type: 'POST',
            data: {
              id: id
            },
            dataType: 'json',
            success: function(res) {
              if (res.status === 'success') {
                $tr.remove();
              } else {
                alert('Error deleting');
              }
            }
          });
        }
      });
    });
  </script>
  <!-- experience js -->


  <!-- Filmography Modal -->
  <div class="modal fade modal-fullpage" id="filmographyModal" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"><i class="fas fa-video me-2"></i>Filmography Management</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">

          <form id="filmographyForm">
            <input type="hidden" name="id" id="filmographyEditId">
            <div class="row g-3">
              <div class="col-md-12">
                <label class="form-label">Project Poster</label>
                <input type="file" class="form-control" name="image" id="filmography_img" accept="image/*">
                <img id="filmography-img-preview" src="#" style="display:none;max-width:140px;margin-top:10px;">
              </div>
              <div class="col-md-8">
                <label class="form-label">Film Title</label>
                <input type="text" class="form-control" name="film_name" placeholder="The Last Horizon" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Status</label>
                <select class="form-select" name="status">
                  <option>Released</option>
                  <option>Post-Production</option>
                  <option>Production</option>
                  <option>Pre-Production</option>
                  <option>Announced</option>
                </select>
              </div>
              <div class="col-md-4">
                <label class="form-label">Year</label>
                <input type="text" class="form-control" name="year" placeholder="2024" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Genre</label>
                <input type="text" class="form-control" name="genre" placeholder="Sci-Fi Drama" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Role</label>
                <input type="text" class="form-control" name="role" placeholder="Assistant Director" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Director</label>
                <input type="text" class="form-control" name="director" placeholder="Director name" required>
              </div>
              <div class="col-md-6">
                <label class="form-label">Video URL (optional)</label>
                <input type="url" class="form-control" name="video_url" placeholder="https://youtube.com/watch?v=...">
              </div>
              <div class="col-md-12">
                <label class="form-label">Synopsis</label>
                <textarea class="form-control" name="film_desc" rows="3" placeholder="Short summary for card"></textarea>
              </div>
              <div class="col-12">
                <button type="submit" class="btn btn-primary me-2">
                  <i class="fas fa-plus me-2"></i>Save Project
                </button>
                <button type="reset" class="btn btn-secondary">
                  <i class="fas fa-redo me-2"></i>Reset
                </button>
              </div>
            </div>
          </form>

          <div class="table-container mt-4">
            <h6 class="section-title-modal mb-3">Project Portfolio</h6>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Poster</th>
                    <th>Status</th>
                    <th>Title</th>
                    <th>Year</th>
                    <th>Genre</th>
                    <th>Role</th>
                    <th>Director</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <!-- Rows dynamic via JS -->
                </tbody>
              </table>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <script>
    // Delete button handlers
    document.querySelectorAll('.btn-danger').forEach(btn => {
      btn.addEventListener('click', function(e) {
        if (confirm('Are you sure you want to delete this item?')) {
          alert('Item deleted! (This is a demo)');
        }
      });
    });

    // Edit button handlers
    document.querySelectorAll('.btn-success').forEach(btn => {
      btn.addEventListener('click', function(e) {
        alert('Edit functionality would open here! (This is a demo)');
      });
    });

    // File input preview
    document.querySelectorAll('input[type="file"]').forEach(input => {
      input.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
          console.log('File selected:', file.name);
        }
      });
    });
  </script>
</body>

</html>