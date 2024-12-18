{{-- create_meeting_modal.blade.php --}}
<div class="modal fade" id="createMeetingModal" tabindex="-1" aria-labelledby="createMeetingModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMeetingModalLabel">Create Meeting</h5>
            </div>
            <div class="modal-body">
                <form id="createMeetingForm">
                    <div class="mb-3">
                        <label for="meetingName" class="form-label">Meeting Name</label>
                        <input type="text" class="form-control" id="meetingName" name="meeting_name" required>
                        <span id="meeting_nameError" style="color: red; font-size: 11px; display: none;">Error Message here</span>
                    </div>
                    <div class="mb-3">
                        <div class="form-group row">
                            <div class="col-12 col-sm-8 col-lg-6 pt-1">
                                <label>Instant Meeting</label><br>
                                <div class="switch-button switch-button-yesno">
                                    <input type="checkbox" checked name="is_instant_meeting" id="isInstantMeeting">
                                    <span><label for="isInstantMeeting"></label></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3" id="scheduleField" style="display: none;">
                        <label for="scheduleStart" class="form-label">Schedule Start</label>
                        <input type="datetime-local" class="form-control" id="scheduleStart" name="schedule_start">
                        <span id="schedule_startError" style="color: red; font-size: 11px; display: none;">Error Message here</span>
                    </div>
                    <div class="mb-3">
                        <label for="duration" class="form-label">Duration (in minutes)</label>
                        <input type="number" class="form-control" id="duration" name="duration" required>
                        <span id="durationError" style="color: red; font-size: 11px; display: none;">Error Message here</span>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div id="successMessage" style="display:none;background-color: #d4edda; color: #155724; border: 1px solid #c3e6cb; padding: 10px; width:100%">
                    Meeting successfully created!
                </div>
                <div id="failedMessage" style="display:none;background-color: #f06f5b; color: white; border: 1px solid #c3e6cb; padding: 10px; width:100%">
                </div>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="submitMeetingForm">Create</button>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript Section --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const isInstantMeetingCheckbox = document.getElementById('isInstantMeeting');
        const scheduleField = document.getElementById('scheduleField');
        const successMessage = document.getElementById('successMessage');
        const failedMessage = document.getElementById('failedMessage');
        isInstantMeetingCheckbox.addEventListener('change', function() {
            if (this.checked) {
                scheduleField.style.display = 'none';
            } else {
                scheduleField.style.display = 'block';
            }
        });

        // Handle form submission via AJAX
        $('#submitMeetingForm').on('click', function(e) {
            e.preventDefault();

            // Clear all previous error messages
            $('.form-control').each(function() {
                const errorSpanId = `#${$(this).attr('name')}Error`;
                $(errorSpanId).hide();
            });

            const formData = {
                meeting_name: $('#meetingName').val(),
                is_instant_meeting: $('#isInstantMeeting').is(':checked') ? 1 : 0,
                schedule_start: $('#scheduleStart').val(),
                duration: $('#duration').val(),
                _token: '{{ csrf_token() }}', // Include CSRF token for Laravel
            };

            $.ajax({
                url: '{{ route("create_meeting") }}', // Update with your route name
                type: 'POST',
                data: formData,
                success: function(response) {
                    successMessage.style.display = 'block';
                    $('#createMeetingForm')[0].reset(); // Reset the form
                    scheduleField.style.display = 'none';
                    failedMessage.style.display = 'none';
                },
                error: function(xhr) {
                    const errors = xhr.responseJSON.errors;
                    failedMessage.textContent = xhr.responseJSON.message; 
                    failedMessage.style.display = 'block';
                    successMessage.style.display = 'none';
                    if (errors) {
                        Object.keys(errors).forEach(function(field) {
                            const errorSpanId = `#${field}Error`;
                            if ($(errorSpanId).length) {
                                $(errorSpanId).text(errors[field][0]).show();
                            }
                        });
                    }
                },
            });
        });

        $('#createMeetingModal').on('shown.bs.modal', function() {
            successMessage.style.display = 'none';
            failedMessage.style.display = 'none';
        });
        $('#createMeetingModal').on('hidden.bs.modal', function() {
            successMessage.style.display = 'none';
            failedMessage.style.display = 'none';
        });
    });
</script>