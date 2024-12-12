<?php

namespace App\Controllers;

use App\Models\AdminModel;
use App\Models\book_movies;
use App\Models\MySql;
use Dompdf\Dompdf;
use Dompdf\Options;
use CodeIgniter\CLI\Console;

class HomeController extends BaseController
{
    protected $model;
    protected $adminModel;
    protected $bookmovies;
    protected $data;

    public function __construct()
    {
        $this->model = new MySql(); // Initialize your model first
        $this->adminModel = new AdminModel();
        $this->bookmovies = new book_movies();
        $this->data = $this->model->findAll(); // Then use the model to fetch data
    }

    public function index(): string
    {
        session()->destroy();
        return view('login');
    }

    public function admin()
    {
        return view('admin', ['data' => $this->data]);
    }

    public function home()
{
    // Start session
    $session = session();

    // Check if user email is set in session
    $userEmail = $session->get('user_email');

    // Fetch search term from query parameters
    $searchTerm = $this->request->getGet('search');
    
    if ($searchTerm) {
        $data = $this->model->like('moviename', $searchTerm)->findAll();
    } else {
        // Fetch all data
        $data = $this->model->findAll();
    }

    // Prepare data to pass to the view
    $viewData = [
        'data' => $data,
        'user_email' => $userEmail
    ];

    // Return the view with the data
    return view('home', $viewData);
}

    

    public function store()
    {
        // Get POST data
        $data = [
            'moviename' => $this->request->getPost('moviename'),
            'genre' => $this->request->getPost('genre'),
            'language' => $this->request->getPost('language'),
            'release_date' => $this->request->getPost('release_date'),
            'duration' => $this->request->getPost('duration'),
            'quality' => $this->request->getPost('quality'),
            'price' => $this->request->getPost('price')
        ];

        // Handle file upload
        $file = $this->request->getFile('img');
        if ($file->isValid() && !$file->hasMoved()) {
            $filePath = WRITEPATH . 'uploads/';
            $fileName = $file->getRandomName();
            if ($file->move($filePath, $fileName)) {
                $data['img'] = $fileName;
            } else {
                return redirect()->back()->with('error', 'Failed to move uploaded file.');
            }
        } else {
            return redirect()->back()->with('error', 'Invalid file upload.');
        }

        // Insert data into the database
        if ($this->model->insert($data)) {
            return redirect()->to('/admincard')->with('success', 'Movie added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add movie to the database.');
        }
    }

    public function getimg($imagename)
    {
        $filepath = WRITEPATH . 'uploads/' . $imagename;
        log_message('info', 'Filepath: ' . $filepath);

        if (file_exists($filepath)) {
            $fileinfo = mime_content_type($filepath);
            header('Content-Type: ' . $fileinfo);
            readfile($filepath);
            exit; // Ensure no further output is sent
        } else {
            // Handle the case where the file does not exist
            echo 'File not found.';
        }
    }

    public function admindata()
    {
        return view('admincard', ['data' => $this->data]);
    }

    public function delete($id)
    {
        $this->model->delete($id);
        return redirect()->to('/admincard');
    }

    public function edit($id)
    {
        $data = [
            'moviename' => $this->request->getPost('moviename'),
            'genre' => $this->request->getPost('genre'),
            'language' => $this->request->getPost('language'),
            'release_date' => $this->request->getPost(index: 'release_date'),
            'duration' => $this->request->getPost('duration'),
            'quality' => $this->request->getPost('quality'),
            'price' => $this->request->getPost('price')
        ];
        log_message('info', 'data: ' . json_encode($data));
        if ($this->model->update($id, $data)) {
            return redirect()->to('/admincard');
        } else {
            echo "Error occurred.";
        }
    }

    public function getUserById(int $id)
    {
        $user = $this->model->find($id);
        if ($user){
            return $this->response->setJSON($user);
        } else {
            return $this->response->setJSON(['error' => 'User not found'], 404);
        }
    }

    public function movieDetail($id)
    {
        $movieDetails = $this->model->find($id);

        return view('Homedetail', ['movieDetails' => $movieDetails]);
    }

    public function login()
    {
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        // Fetch the admin by email 
        $email1 = $this->adminModel->where('email', $email)->first();
        $password1 = $this->adminModel->where('password', $password)->first();
        // log_message('info', 'data: ' . json_encode($admin)); 
        if ($email1 && $password1 && $email === 'admin@gmail.com') {
            // Admin exists, set session data 
            session()->set('admin_email', $email1['email']); //log_message('info', 'Admin logged in: ' . json_encode($email1));
            return redirect()->to('/admincard')->with('success', 'successfull admin login');
        } elseif ($email1 && $password1) {
            // Admin exists, set session data 
            session()->set('user_email', $email1['email']); //log_message('info', 'Admin logged in: ' . json_encode($email1));

            return redirect()->to('/home')->with('success', 'successfull user login');
        } else {
            // Admin does not exist 
            return redirect()->back()->with('error', 'Invalid email or password.');
        }
    }

    public function register()
    {
        // Get the posted data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $confirm_password = $this->request->getPost('confirm_password');

        // Ensure password and confirm password match
        if ($password !== $confirm_password) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Prepare data for insertion
        $data = [
            'email' => $email,
            'password' => $password
        ];

        // Save the user data
        $this->adminModel->insert($data);
        // session()->setFlashdata('success', '');
        // Redirect to the login page with a success message
        return redirect()->to('/')->with('success', 'Registration successful. Please log in.');
    }

    public function slote($id)
    {
        // Fetch user data based on the provided ID
        $user = $this->model->find($id);

        // Fetch seat numbers from the bookings model
        $email = session()->get('user_email');
        $bookedSeats = $this->bookmovies->select('seat_number')
            //->where('user_email', $email)
            ->where('movie', $user['moviename'])
            ->get()
            ->getResultArray(); // Fetch all seat numbers
        $seatNumbers = [];
        foreach ($bookedSeats as $seat) {
            $individualSeats = explode(' ', $seat['seat_number']);
            $seatNumbers = array_merge($seatNumbers, $individualSeats);
        }
        // Extract seat numbers into an array
        log_message('info', 'booked: ' . json_encode($bookedSeats));

        //$seatNumbers = array_column($bookedSeats, 'seat_number');

        // Log the fetched seat numbers
        //   log_message('info', 'seats: ' . json_encode($seatNumbers));

        // Prepare data to pass to the view
        $data = [
            'data' => $user,
            'seat_numbers' => $seatNumbers
        ];

        // Return the view with the data
        return view('slot_book', $data);
    }





    public function bookSeat()
    {
        $session = session();
        $userEmail = $session->get('user_email');

        $data = $this->request->getJSON(true);


        // Validate inputs
        if (!is_array($data['selectedSeats']) || empty($data['selectedSeats'])) {
            return $this->response->setJSON(['success' => false, 'message' => 'No seats selected.']);
        }

        // Check if any seat is already booked
        foreach ($data['selectedSeats'] as $seatNumber) {
            $existingBooking = $this->bookmovies->where(['movie' => $data['movie'], 'seat_number' => $seatNumber])->first();
            if ($existingBooking) {
                return $this->response->setJSON(['success' => false, 'message' => "Seat $seatNumber is already booked."]);
            }
        }

        // Save the booking

        $this->bookmovies->insert([
            'user_email' => $userEmail,
            'movie' => $data['movie'],
            'seat_number' => implode(" ", $data['selectedSeats']), // Corrected here to save individual seat numbers
            'price' => $data['price']
        ]);

        return $this->response->setJSON(['success' => true, 'message' => 'Seats booked successfully.']);
    }




    //see ticket table
    public function showBookedSeats()
    {
        // Ensure the session is started 
        // Retrieve the user ID from the session 
        $userEmail = session()->get('user_email'); // Initialize the model 

        // Fetch all data where user email matches 
        $data['bookmovies'] = $this->bookmovies->where('user_email', $userEmail)->findAll();
        // Load the view and pass the data
        return view('booked_ticket', $data);
    }

    public function viewTicket($movieName)
    {
        // Fetch movie data based on the movie name
        $movie = $this->model->where('moviename', $movieName)->first();

        // Check if movie data was found
        if (!$movie) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Movie with name $movieName not found.");
        }

        // Log the movie data (optional)


        // Convert movie object to array


        // Prepare data to pass to the view
        $data = ['movie' => $movie];

        // Return the view with the data
        return view('ticket', $data);
    }






    public function downloadPdf($name)
    {
        // Get seat number and price from the request
        $seatnumber = $this->request->getGet('seat_number');
        $price = $this->request->getGet('price');

        // Fetch movie data
        $movie = $this->model->where('moviename', $name)->first();

        // Check if movie data is found
        if (!$movie) {
            return redirect()->back()->with('error', 'Movie not found.');
        }

        // Prepare data for the PDF
        $data = [
            'seat_number' => esc($seatnumber),
            'price' => esc($price),
            'movie' => $movie,
             
        ];

        // Load the view file for the PDF
        $html = view('ticket', $data); // Ensure you have a view file named pdf_template.php

        // Initialize Dompdf
        $options = new Options();
        $options->set('defaultFont', 'Courier');
        $dompdf = new Dompdf($options);

        // Load HTML content
        $dompdf->loadHtml($html);

        // (Optional) Setup the paper size and orientation
        $dompdf->setPaper('A4', 'portrait');

        // Render the HTML as PDF
        $dompdf->render();

        // Output the generated PDF to Browser
        $dompdf->stream("ticket_for_" . strtolower(str_replace(' ', '_', $movie['moviename'])) . ".pdf", ["Attachment" => true]);
    }
}


    



