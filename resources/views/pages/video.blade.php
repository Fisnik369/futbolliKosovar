@extends('layouts.app')

@section('content')

<div class="custom-modal" id="recording-options-modal">
    <div class="custom-modal-content">
      <div class="row text-center"></div>

      <div class="row mt-3">
        <div class="col-md-12 text-center">
          <button class="btn btn-outline-danger" id="closeModal">
            Close
          </button>
        </div>
      </div>
    </div>
  </div>

  <nav class="navbar fixed-top bg-info rounded-0 d-print-none">
    <div class="text-white">Video Call</div>

    <div class="pull-right room-comm" hidden>
      <button
        class="btn btn-sm rounded-0 btn-no-effect"
        id="toggle-video"
        title="Hide Video"
      >
        <i class="fa fa-video text-white"></i>
      </button>

      <button
        class="btn btn-sm rounded-0 btn-no-effect"
        id="toggle-mute"
        title="Mute"
      >
        <i class="fa fa-microphone-alt text-white"></i>
      </button>

      <button
        class="btn btn-sm text-white pull-right btn-no-effect"
        id="toggle-chat-pane"
      >
        <i class="fa fa-comment"></i>
        <span
          class="badge badge-danger very-small font-weight-lighter"
          id="new-chat-notification"
          hidden
          >New</span
        >
      </button>

      <button class="btn btn-sm rounded-0 btn-no-effect text-white">
        <a href="/" class="text-white text-decoration-none"
          ><i class="fa fa-sign-out-alt text-white" title="Leave"></i
        ></a>
      </button>
    </div>
  </nav>

  <div class="container-fluid" id="room-create" hidden>
    <div class="row">
      <div class="col-12 h2 mt-5 text-center">Create Room</div>
    </div>

    <div class="row mt-2">
      <div class="col-12 text-center">
        <span class="form-text small text-danger" id="err-msg"></span>
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3">
        <label for="room-name">Room Name</label>
        <input
          type="text"
          id="room-name"
          class="form-control rounded-0"
          placeholder="Room Name"
        />
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3">
        <label for="your-name">Your Name</label>
        <input
          type="text"
          id="your-name"
          class="form-control rounded-0"
          placeholder="Your Name"
        />
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3">
        <button id="create-room" class="btn btn-block rounded-0 btn-info">
          Create Room
        </button>
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3" id="room-created"></div>
    </div>
  </div>

  <div class="container-fluid" id="username-set" hidden>
    <div class="row">
      <div class="col-12 h4 mt-5 text-center">Your Name</div>
    </div>

    <div class="row mt-2">
      <div class="col-12 text-center">
        <span
          class="form-text small text-danger"
          id="err-msg-username"
        ></span>
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3">
        <label for="username">Your Name</label>
        <input
          type="text"
          id="username"
          class="form-control rounded-0"
          placeholder="Your Name"
        />
      </div>

      <div class="col-12 col-md-4 offset-md-4 mb-3">
        <button id="enter-room" class="btn btn-block rounded-0 btn-info">
          Enter Room
        </button>
      </div>
    </div>
  </div>

  <div class="container-fluid room-comm" hidden>
    <div class="row">
      <video
        class="local-video mirror-mode"
        id="local"
        volume="0"
        autoplay
        muted
      ></video>
    </div>

    <div class="row">
      <div class="col-md-12 main" id="main-section">
        <div class="row mt-2 mb-2" id="videos"></div>
      </div>

      <div
        class="col-md-3 chat-col d-print-none mb-2 bg-info chat-opened"
        id="chat-pane"
      >
        <div class="row">
          <div class="col-12 text-center h2 mb-3">CHAT</div>
        </div>

        <div id="chat-messages"></div>

        <div class="row">
          <textarea
            id="chat-input"
            class="form-control rounded-0 chat-box border-info"
            rows="3"
            placeholder="Type here..."
          ></textarea>
        </div>
      </div>
    </div>
  </div>


@endsection
