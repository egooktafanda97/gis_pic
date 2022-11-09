#!/usr/bin/env node

var notifier = require('terminal-notifier');
var yargs = require('yargs')
  .usage("Usage: $0 --message <foo> --title <bar>")
  .demand(["message"])
  .argv;

if (yargs.title) {
  notifier(yargs.message, { title: yargs.title });
} else {
  notifier(yargs.message);
}
