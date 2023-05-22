import cv2

# Open the default camera
cap = cv2.VideoCapture(0)

# Check if the camera is opened successfully
if not cap.isOpened():
    print("Failed to open the camera")
    exit()

# Capture a frame from the camera
ret, frame = cap.read()

# Check if the frame is captured successfully
if not ret:
    print("Failed to capture frame from the camera")
    exit()

# Save the captured image
cv2.imwrite("captured_image.jpg", frame)

# Release the camera
cap.release()
