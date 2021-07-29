
{% extends 'partials/header.html' %}
{% block body %}Apply Leave Panel{% endblock %}
{% block content %}
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>
<body class="bg-secondary">
  {{ include('partials/navigation.php') }}
  <div class="w-50 mx-auto my-5 ">
    {% if session.message %}
    <div class="error">{{session.message}}</div>
    {% endif %}
    <h2 class="mb-5">Fill Out The Form For Applying Leave</h2>
    <form action="" method="POST" name="applyLeave">
      <div class="form-group mb-5">
          <label for="textarea">Reason</label>
          <textarea class="form-control" id="textarea" name="textarea"></textarea>
      </div>
      <div class="mb-5">
        <label for="dob" class="form-label">Start Date</label>
        <input type="text" class="date form-control" name="dob" id="dob" onkeypress="return false">
      </div>
      <div class="mb-5">
        <label for="dob1" class="form-label">End Date</label>
        <input type="text" class="date form-control" name="dob1" id="dob1" onkeypress="return false">
      </div>
      <div class="col-md-12 text-center">
        <span class="submit">
          <button type="submit" class="btn btn-primary">Apply</button>
        </span>
        <button type="reset" class="btn btn-primary">Clear</button>
      </div>
    </form>
  </div>
<script src="../public/javascript/applyleave.js"></script>
{% endblock %}