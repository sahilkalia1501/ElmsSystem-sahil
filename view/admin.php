{% extends 'partials/header.html' %}

{% block body %}Admin Panel{% endblock %}

{% block head %}
    {{ include('partials/navigation.php') }}
{% endblock %}

{% block content %}
    <span id="result"></span>
    <div class="container">
        {% if session.leave %}
            <div class="alert alert-primary" role="alert">
                {{session.leave}}        
            </div>
        {% endif %}
    </div>
    <!-- table leave  -->
    <h1 class="text-center">EMPLOYEE LEAVE PROPOSAL REJECT OR APPROVED</h1>
    <div class="container mt-5 mb-5">
        <table class="table table-dark table-striped my-3" id="myTable">
            <thead>
                <tr>
                    <th scope="col">Sno</th>
                    <th scope="col">Emp-ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Reason</th>
                    <th scope="col">StartDate</th>
                    <th scope="col">EndDate</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            {% if count > 0 %}
                {% for leave in range(0, count-1) %}                        
                    <tr>
                        <td>{{leave+1}}.</td>
                        <td>{{leaves[leave].emp_id}}</td>
                        <td>{{leaves[leave].first_name | title}} {{leaves[leave].last_name}}</td>
                        <td>{{leaves[leave].reason}}</td>
                        <td>{{leaves[leave].start_date}}</td>
                        <td>{{leaves[leave].end_date}}</td>
                        <td>
                            <button id='{{ leaves[leave].id | base64_encode }}' name='{{ leaves[leave].emp_id | base64_encode }}' class="approve btn btn-success">Approve</button>  <button id='{{ leaves[leave].id | base64_encode }}' class="reject btn btn-danger mx-1">Reject</button> <button class="userdetails btn btn-info" id='{{ leaves[leave].id | base64_encode }}'>Check Status</button>
                        </td>
                    </tr>
                {% endfor %}
            {% endif %}
            </tbody>
        </table>
    </div>

        {% if num > 0 %}
        <h1 class="text-center">User Detail For Specific Leave</h1>
        <div class="container mt-5 mb-5">
            <table class="table table-dark table-striped my-3">
                <thead>
                    <tr>
                        <th>Sno</th>
                        <th>Leave Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    {% set start_date = diffTime(leavedetail[0].leave_applied) %}
                    {% for detailLeave in range(0, num-1) %}
                    <tr>
                        <td>{{detailLeave+1}}</td>
                        <td>{{leavedetail[detailLeave].leave_applied}}</td>
                        {% set status = leavedetail[detailLeave].status %}
                        <td>
                            {% if status == "0" %}
                                PENDING 
                            {% elseif status == "1" %} 
                                APPROVED
                            {% elseif status == "2" %} 
                                REJECTED 
                            {% endif %}
                        </td>
                        <td>
                            {% if start_date <= 0 %}
                            <button class="btn btn-info" disabled>N/A</button>
                            {% elseif status == "0" %} 
                            <button id='{{ leavedetail[detailLeave].id | base64_encode }}' class="rejectS btn btn-danger" name='{{ leavedetail[detailLeave].leave_id | base64_encode }}'>REJECT</button> <button id='{{ leavedetail[detailLeave].id | base64_encode }}' class="approveS btn btn-success" name='{{ leavedetail[detailLeave].leave_id | base64_encode }}'>APPROVED</button>
                            {% elseif status == "1" %} 
                            <button id="'{{ leavedetail[detailLeave].id | base64_encode }}'" class="rejectS btn btn-danger" name='{{ leavedetail[detailLeave].leave_id | base64_encode }}'>REJECT</button>  
                            {% elseif status == "2" %}  
                            <button id='{{ leavedetail[detailLeave].id | base64_encode }}' class="approveS btn btn-success" name='{{ leavedetail[detailLeave].leave_id | base64_encode }}'>APPROVED</button>  
                            {% endif %}
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>                
        {% endif %}
        
<!-- Modal View -->
        <div class="modal fade" id="leaveModal" tabindex="-1" aria-labelledby="leaveModal" aria-hidden="true" data-backdrop="false">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="leaveModal">User Leave Applied</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    
                    </div>
                </div>
            </div>
        </div>
<!-- End Modal -->

</div>
<script src="../public/javascript/admin.js"></script>
{% endblock %}